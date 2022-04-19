<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AdminViewCategoryComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.admin-view-category-component',['categories'=>$categories])->layout('layouts.adminbase');
    }
}
