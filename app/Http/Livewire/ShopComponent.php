<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Product;
use Cart;


class ShopComponent extends Component
{
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('Success_message','Item added in cart');
        return redirect()->route('product.cart'); 
    }


    use WithPagination;
    public function render()
    {
        $categories = Category::All();
         $product = Product::paginate(12);
        return view('livewire.shop-component',['products'=>$product,'categories'=>$categories])->layout('layouts.base');
    }
}
