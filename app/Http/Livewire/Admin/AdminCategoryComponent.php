<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AdminCategoryComponent extends Component
{
    use withPagination;
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('delete_message','Category has been deleted successfully');
    }
    public function render()
    {
        //feathc all the categories model
        
        $this->$category = Category::All();
        //return array of categories to view
        return view('livewire.admin.admin-category-component',['categories'=>$category])->layout('layouts.base');
    }
}
