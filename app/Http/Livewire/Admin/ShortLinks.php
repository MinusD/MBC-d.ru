<?php

namespace App\Http\Livewire\Admin;

use App\Models\CustomLink;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ShortLinks extends Component
{
    use WithPagination;
    public $data1 = [];


   public function mount(){
//       $this->data1 =  DB::table('users')->orderBy('id')->cursorPaginate(1);
   }

    public function render()
    {
        return view('livewire.admin.short-links', ['data' => CustomLink::paginate(50)])->layout('layouts.admin');
    }
}
