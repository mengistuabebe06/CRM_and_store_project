<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;

class CategoryComponent extends Component
{
    public $category_slug;
    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('Success_message','Item added in cart');
        return redirect()->route('product.cart'); 
    }


    use WithPagination;
    public function render()
    {
        //fetch all categories
        $category = Category::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        // edit the pagination here 
        
        $product = Product::where('category_id',$category_id)->paginate(6);
        //$product = Product::paginate(12);
        $categories = Category::All();
        
        return view('livewire.category-component',['products'=>$product,'categories'=>$categories,'category_name'=>$category_name])->layout('layouts.base');
    }
}
