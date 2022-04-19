<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        //chage this using admoin header and footer (base)
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.adminbase');
    }
}
