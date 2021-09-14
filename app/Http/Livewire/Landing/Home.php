<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.landing.home')->layout('layouts.landing');
    }
}
