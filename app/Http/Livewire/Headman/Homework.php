<?php

namespace App\Http\Livewire\Headman;

use Livewire\Component;

class Homework extends Component
{
    public function render()
    {
        return view('livewire.headman.homework')->layout('layouts.headman');
    }
}
