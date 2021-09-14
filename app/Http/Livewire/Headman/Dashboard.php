<?php

namespace App\Http\Livewire\Headman;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.headman.dashboard')->layout('layouts.headman');
    }
}
