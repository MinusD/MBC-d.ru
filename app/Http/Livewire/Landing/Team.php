<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;

class Team extends Component
{
    public function render()
    {
        return view('livewire.landing.team')->layout('layouts.landing');
    }
}
