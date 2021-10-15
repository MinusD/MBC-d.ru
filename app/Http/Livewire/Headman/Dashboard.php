<?php

namespace App\Http\Livewire\Headman;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $students = [];
    public $group;

    public function mount(){
        $this->group = Group::where('headman_id', \Auth::id())->first();
        $this->students = User::where('group_id', $this->group->id)->get();
//        dd($this->students);
    }

    public function render()
    {
        return view('livewire.headman.dashboard')->layout('layouts.headman');
    }
}
