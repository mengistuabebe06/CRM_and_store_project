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
        ]);
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
    }

    public function render()
    {
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
