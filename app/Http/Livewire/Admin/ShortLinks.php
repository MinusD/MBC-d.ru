<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ShortLinks extends Component
{
    public function render()
    {
        return view('livewire.admin.short-links')->layout('layouts.admin');
    }
}
