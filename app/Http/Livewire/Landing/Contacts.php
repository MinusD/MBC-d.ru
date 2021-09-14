<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;

class Contacts extends Component
{
    public function render()
    {
        return view('livewire.landing.contacts')->layout('layouts.landing');
    }
}
