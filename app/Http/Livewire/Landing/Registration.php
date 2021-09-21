<?php

namespace App\Http\Livewire\Landing;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;

class Registration extends Component
{

    public $redirect_data;
    public $name;
    public $sname;
    public $pname;
    public $email;
    public $step = 1;
    public $st = true;
    public $group_slug;
    public $groups = [];
    public $confirm_group = [];
    public $group_search_error = false;
    public $isset_groups_list = [];
    public $confirm_group_id = 0;
    public $pass;
    public $pass_2;

    protected $queryString = [
        'redirect_data' => ['except' => ''],
    ];


    public function test()
    {
        dd(13);
    }

    public function reg_by_headman(){
        $user = new User();
        $user->name = $this->name;
        $user->sname = $this->sname;
        $user->pname = $this->pname;

    }

    public function search_group()
    {
        $tmp = $this->groups;
        $key = array_search(
            $this->group_slug,
            array_column($tmp, 'groupName')
        );
        dd($this->groups[$key]);
    }

    public function search_group_by_student()
    {
        $groups = Group::where('group_name', $this->group_slug)->get();
        $this->isset_groups_list = [];
        foreach ($groups as $group) {
//            dd($group);
            $h = User::find($group->headman_id, ['name', 'sname', 'pname']);
            array_push($this->isset_groups_list, ['id' => $group->id,'group_name' => $group->group_name, 'headman' => $h->sname . ' ' . $h->name . ' ' . $h->pname]);
        }
        $this->group_search_error = false;
        if (count($this->isset_groups_list) == 1){
            $this->confirm_group_id =  $this->isset_groups_list[0]['id'];
        } elseif (count($this->isset_groups_list) == 0){
            $this->group_search_error = true;
        }
    }

    public function search_group_by_headman()
    {
        $path = env('API_SERVER') . 'groups/all';
        $this->groups = json_decode(file_get_contents($path));
        $tmp = $this->groups;
        $key = array_search(
            $this->group_slug,
            array_column($tmp, 'groupName')
        );
        if ($this->groups[$key]->groupName == $this->group_slug) {
            $this->group_search_error = false;
            $this->confirm_group = ['groupName' => $this->groups[$key]->groupName, 'groupSuffix' => $this->groups[$key]->groupSuffix];
        } else {
            $this->group_search_error = true;
        }
    }


    public function mount()
    {
        if (!is_null($this->redirect_data)) {
            echo 'redirect';
        }
    }


    public function render()
    {
        return view('livewire.landing.registration')->layout('layouts.landing');
    }
}
