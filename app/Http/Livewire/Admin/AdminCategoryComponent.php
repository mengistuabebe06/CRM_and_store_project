<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AdminCategoryComponent extends Component
{
    public $category;
    use withPagination;
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('delete_message','Category has been deleted successfully');
    }
    public function render()
    {
        // feathc all the categories model
        
        $category = Category::All();
        // $category=Category::paginate(5);
        //return array of categories to view
        return view('livewire.admin.admin-category-component')->layout('layouts.base');
    }
}
