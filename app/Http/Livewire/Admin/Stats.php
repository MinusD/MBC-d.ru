<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Stats extends Component
{
    public function render()
    {
        return view('livewire.admin.stats')->layout('layouts.admin');
    }
}
