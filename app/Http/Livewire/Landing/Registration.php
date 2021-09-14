<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;

class Registration extends Component
{

    public $redirect_data;
    public $name;
    public $surname;
    public $pname;
    public $email;
    public $groups;
    public $step = 1;


    protected $queryString = [
        'redirect_data' => ['except' => ''],
    ];


    public function mount(){
        if (!is_null($this->redirect_data)){
            echo 'redirect';
        }
    }

    public function render()
    {
        return view('livewire.landing.registration')->layout('layouts.landing');
    }
}
