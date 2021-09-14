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
    public $step = 1;
    public $st = true;
    public $group_slug;
    public $groups = [];

    protected $queryString = [
        'redirect_data' => ['except' => ''],
    ];


    public function test()
    {
        dd(13);
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

    public function mount()
    {
        if (!is_null($this->redirect_data)) {
            echo 'redirect';
        }
        $path = env('API_SERVER') . 'groups/all';
        $this->groups = json_decode(file_get_contents($path));
    }


    public function render()
    {
        return view('livewire.landing.registration')->layout('layouts.landing');
    }
}
