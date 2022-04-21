<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AdminViewCategoryComponent extends Component
{
    public $categories = [];
    use WithPagination;
    public function render()
    {
        // $categories = Category::all();
        // echo "categories name isn :" ;
        // echo ($categories->name);
        $this->$categories=Category::all();
        //return array of categories to view
        //return view('livewire.admin.admin-category-component')->layout('layouts.adminbase');
        return view('livewire.admin.admin-view-category-component',['categories'=> $categories])->layout('layouts.adminbase');
    }
}
