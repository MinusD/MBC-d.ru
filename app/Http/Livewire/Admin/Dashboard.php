<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
//    public function mount() {
//        dd(json_decode(file_get_contents('https://mirea.xyz/api/v1.2/groups/certain?name=%D0%98%D0%9A%D0%91%D0%9E-30-21&suffix=%D0%9A%D0%98%D0%A1')));
//    }

    public function render()
    {
        return view('livewire.admin.dashboard')->layout('layouts.admin');
    }
}
