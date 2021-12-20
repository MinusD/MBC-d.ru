<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Helper extends Component
{
    public $is_activate = false;
    public $code;


    public function auth(){
        if ($this->code = "9585"){
            $this->is_activate = true;
            $this->code = "";
        }
    }

    public function exit(){
        $this->is_activate = false;
    }


    public function render()
    {
        return view('livewire.admin.helper')->layout('layouts.landing');
    }
}
