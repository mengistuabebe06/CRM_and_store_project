<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
    public function generateslug()
    {
        $this->slug = Str::slug($this->name,'');
    }
    public function UpdateProduct()
    {
        $product=new Product();
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->decription=$this->decription;
        $product->price=$this->price;
        $product->stock_status=$this->stock_status;
        $product->feature=$this->feature;
        $product->quantity=$this->quantity;
        $product->image=$this->image;
        $product->category_id=$this->category_id;

        $imagename= Carbon::now()->timestamp.'-'.$$this->image->extentions();
        $this->image->storeAs('products',$imagename);
        $product->image=$imagename;
        $product->category_id=$this->category_id;
        $product->save();
        session()->flash('message','product has been created succesfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-product-component')->layout('layouts.adminbase');
    }
}
