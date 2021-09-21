<?php

namespace App\Http\Livewire\Headman;

use App\Models\Group;
use Livewire\Component;

class Pins extends Component
{
    public $info_modal = true;
    public $new_code;
    public $data = [];

    public function mount(){
        $this->data = Group::where('headman_id', \Auth::id())->first();

    }

    public function openModal(){
        $this->info_modal = true;
    }

    public function saveNewCode(){

    }

    public function render()
    {
        return view('livewire.headman.pins')->layout('layouts.headman');
    }
}
