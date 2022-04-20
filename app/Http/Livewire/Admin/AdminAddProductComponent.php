<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdminAddProductComponent extends Component
{
    public $name;
    public $slug;
    public $decription;
    public $price;
    public $stock_status;
    public $feature;
    public $quantity;
    public $image;
    public $category_id;

    public function mount()
    {
        $this->stock_status = "instock";
        $this->feature=0;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function addProduct()
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
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.adminbase');
    }
}
