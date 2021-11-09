<?php

namespace App\Http\Livewire\Headman;

use Livewire\Component;

class Services extends Component
{
    public function render()
    {
        return view('livewire.headman.services')->layout('layouts.headman');
    }
}
