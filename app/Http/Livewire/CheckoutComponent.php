<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutComponent extends Component
{
    public $ship_to_different;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $paymentmode;
    public $thankyou;

    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required | email',
            'mobile'=>'required | numeric',
            'line1'=>'required',
            'city'=>'required',
            'province'=>'required',
            'country'=>'required',
            'zipcode'=>'required',
            'paymentmode'=>'required',
        ]);
        if($this->ship_to_different)
        {
            $this->validateOnly([
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_email'=>'required | email',
                's_mobile'=>'required | numeric',
                's_line1'=>'required',
                's_city'=>'required',
                's_province'=>'required',
                's_country'=>'required',
                's_zipcode'=>'required',
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required | email',
            'mobile'=>'required | numeric',
            'line1'=>'required',
            'city'=>'required',
            'province'=>'required',
            'country'=>'required',
            'zipcode'=>'required',
            'paymentmode'=>'required',
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->ger('checkout')['discount'];
        $order->total = session()->ger('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;

        $order->status = 'ordered';
        $order->is_shipping_diffrent = $this->ship_to_different ?1:0;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderitem = new OrderItem();
            $orderitem->product_id=$item->id;
            $orderitem->order_id=$order->id;
            $orderitem->price=$item->price;
            $orderitem->quantity=$item->qty;
            $orderitem->save();
        }
        if($this->ship_to_different)
        {
            $this->validate([
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_email'=>'required | email',
                's_mobile'=>'required | numeric',
                's_line1'=>'required',
                's_city'=>'required',
                's_province'=>'required',
                's_country'=>'required',
                's_zipcode'=>'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id=$order_id;
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->email = $this->s_email;
            $shipping->mobile = $this->s_mobile;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->city = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->country = $this->s_country;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->save();
        }
        if($this->paymentmode == 'cod')
        {
            $transaction = new Transaction();
            $transaction->user_id=Auth::user()->id;
            $transaction->order_id=$order_id;
            $transaction->mode='cod';
            $transaction->status='pending';
            $transaction->save();
        }
        $this->thankyou=1;
        Cart::instance('cart')->destroy();
        session()-forget('checkout');
    }

    public function verifyFOrcheckout()
    {
        if(Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');

        }
    }
    public function render()
    {
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
