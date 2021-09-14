<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class Pin extends Component
{
    public function render()
    {
        return view('livewire.student.pin')->layout('layouts.student');
    }
}
