<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class Schedule extends Component
{

    public $select_group_module = false;
    public $view_groups;


    protected $groups_list = [];

    public function mount()
    {
        if (Cookie::has('schedule-group-name')) {
            $this->get_data(Cookie::get('schedule-group-name'));
        } else {
            $this->select_group_module = true;

            $path = env('API_SERVER') . 'groups/all';

            $this->groups_list = json_decode(file_get_contents($path));
            $this->view_groups[0] = $this->groups_list[0];
            $this->view_groups[1] = $this->groups_list[1];
            $this->view_groups[2] = $this->groups_list[2];
            $this->view_groups[3] = $this->groups_list[3];
            $this->view_groups[4] = $this->groups_list[4];
//            dd($this->group_list);
        }
    }

    public function get_data()
    {

    }

    public function select($name)
    {
        Cookie::queue(Cookie::forever('schedule-group-name', $name));
    }

    public function render()
    {
        return view('livewire.guest.schedule')->layout('layouts.guest');
    }
}
