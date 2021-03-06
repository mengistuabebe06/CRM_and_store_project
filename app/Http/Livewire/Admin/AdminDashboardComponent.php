<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class AdminDashboardComponent extends Component
{
    public $categories=[];
    public function render()
    {
        //chage this using admoin header and footer (base)
        $categories= Category::all();
        return view('livewire.admin.admin-dashboard-component',['categories'=>$categories])->layout('layouts.adminbase');
    }
}
