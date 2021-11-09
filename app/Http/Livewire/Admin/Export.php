<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Export extends Component
{
    public function render()
    {
        return view('livewire.admin.export')->layout('layouts.admin');
    }
}
