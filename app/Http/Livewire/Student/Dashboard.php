<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class Dashboard extends Component
{


    public function render()
    {
        $this->redirect(route('student.schedule'));
        return view('livewire.student.dashboard')->layout('layouts.student');
    }
}
