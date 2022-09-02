<?php

namespace App\Http\Livewire\Admin;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Groups extends Component
{
    use WithPagination;

    public $data = [];

    public function getData()
    {

        $this->data = Group::all();
        foreach ($this->data as $t) {
            $t['counter'] = User::where('group_id', $t['id'])->count();
        }
//        dd( $this->data );
//        dd($tmp);
    }

    public function mount()
    {
        $this->getData();
    }

    public function render()
    {
        return view('livewire.admin.groups')->layout('layouts.admin');
    }
}
