<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;

class RegByCode extends Component
{
    public $t;

    protected $queryString = [
        't' => ['except' => ''],
    ];

    public function mount(){
        if (isset($this->t)){
//            dd($this->t);
        } else {
            abort(401);
        }
    }

    public function render()
    {
        return view('livewire.landing.reg-by-code')->layout('layouts.landing');
    }
}
