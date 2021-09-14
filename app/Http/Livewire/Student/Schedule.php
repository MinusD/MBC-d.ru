<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class Schedule extends Component
{
    public function render()
    {
        return view('livewire.student.schedule')->layout('layouts.student');
    }
}
