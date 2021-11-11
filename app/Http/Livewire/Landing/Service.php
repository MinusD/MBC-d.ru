<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;

class Service extends Component
{
    public function mount(){
        $this->redirect(route('landing.services.help.informatics'));
    }

    public function render()
    {
        return view('livewire.landing.service')->layout('layouts.landing');
    }
}
