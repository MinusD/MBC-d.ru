<?php

namespace App\Http\Livewire\Moderator;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.moderator.dashboard')->layout('layouts.moderator');
    }
}
