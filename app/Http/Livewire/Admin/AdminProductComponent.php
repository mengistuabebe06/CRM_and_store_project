<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\withPagination;

class AdminProductComponent extends Component
{
    use withPagination;
    public function render()
    {
        //fetch a prodcts from database
        $products =Product::paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.admin');
    }
}
