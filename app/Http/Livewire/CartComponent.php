<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

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

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
