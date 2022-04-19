<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminEditProductComponent extends Component
{
    public $name;
    public $product_slug;
    public $decription;
    public $price;
    public $stock_status;
    public $feature;
    public $quantity;
    public $image;
    public $category_id;
    public $product_id;
    public $new_image;

    public function mount($product_slug)
    {
        $product =  Product::where('slug',$product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->decription = $product->name;
        $this->price = $product->name;
        $this->stock_status = $product->name;
        $this->feature = $product->name;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->product_id = $product->product_id;
        $this->new_image = $product->new_image;


    }
    public function render()
    {
        return view('livewire.admin.admin-edit-product-component')->layout('layouts.adminbase');
    }
}
