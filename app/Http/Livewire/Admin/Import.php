<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Import extends Component
{
    public function mount($token)
    {
        if ($token == env('IMPORT_DATA_TOKEN')) {
            return 123;
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.admin.import')->layout('layouts.guest');
    }
}
