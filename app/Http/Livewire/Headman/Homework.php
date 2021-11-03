<?php

namespace App\Http\Livewire\Headman;

use Livewire\Component;

class Homework extends Component
{
    public $act;
    public $add_homework_modal_is_open = false;

    protected $queryString = [
        'act' => ['except' => ''],
    ];

    public function mount()
    {
        if ($this->act == "add-homework"){
            $this->add_homework_modal_is_open = true;
//            $this->act = "";
        }
    }
    public function open_add_homework_modal(){
        $this->add_homework_modal_is_open = true;
    }


    public function render()
    {
        return view('livewire.headman.homework')->layout('layouts.headman');
    }
}
