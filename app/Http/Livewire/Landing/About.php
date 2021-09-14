<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.landing.about')->layout('layouts.landing');
    }
}
