<?php

namespace App\Http\Livewire\Landing\Service;

use App\Models\TeacherInformation;
use Livewire\Component;

class TeachersInfo extends Component
{
    public $info;
    public $t;

    protected $queryString = [
        't' => ['except' => ''],
    ];

    public function mount(){
        $this->get_info();
    }

    public function get_info(){
        $this->info = TeacherInformation::where('short_name', $this->t)->first();
    }

    public function search(){

    }

    public function render()
    {
        return view('livewire.landing.service.teachers-info')->layout('layouts.landing');
    }
}
