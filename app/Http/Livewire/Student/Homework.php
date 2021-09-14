<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class Homework extends Component
{
    public function render()
    {
        return view('livewire.student.homework')->layout('layouts.student');
    }
}
