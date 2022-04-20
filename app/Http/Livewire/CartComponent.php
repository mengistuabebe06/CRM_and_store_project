<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Faceades\Auth;

class CartComponent extends Component
{
    public function increaseQunatity($row_id)
    {
        $product = Cart::get($row_id);
        $qty = $product->qty + 1;
        Cart::update($row_id,$qty);
    }
    public function decreseQunatity($row_id)
    {
        $product = Cart::get($row_id);
        $qty = $product->qty - 1;
        Cart::update($row_id,$qty);
    }
    public function destroy($row_id)
    {
        Cart::remove($row_id);
        session()->flash('sucess_message','sucessfuly delete an item');
    }

    public function destroyAll()
    {
        Cart::destroy();
    }

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        // if(session()->has('coupon'))
        // {
        //     session()->put('checkout',[
        //         'discount'=>$this->discout,
        //         'subtotal'=>$this->subtotalafterdiscout,
        //         'tax'=>$this->taxafterdiscout,
        //         'total'=>$this->totalafterdiscout,
        //     ]);
        // }
        // else
        // {
            session()->put('checkout',[
                'discount'=>0,
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'tax'=>Cart::instance('cart')->tax(),
                'total'=>Cart::instance('cart')->total(),
            ]);
        
    }

    public function render()
    {
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
