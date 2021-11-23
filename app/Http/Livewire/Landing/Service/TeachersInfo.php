<?php

namespace App\Http\Livewire\Landing\Service;

use App\Models\RequestForAddTeachersInformation;
use App\Models\TeacherInformation;
use Livewire\Component;
use WireUi\Traits\Actions;

class TeachersInfo extends Component
{
    use Actions;
    public $info;
    public $t;
    public $ask_modal = false;
    public $comment = "";

    protected $queryString = [
        't' => ['except' => ''],
    ];

    public function mount(){
        $this->get_info();
    }

    public function get_info(){
        $this->info = TeacherInformation::where('short_name', $this->t)->first();
    }

    public function open_modal_ask(){
        $this->ask_modal = true;
    }

    public function send_ask(){
        $ask = new RequestForAddTeachersInformation();
        $ask->short_name = $this->t;
        $ask->comment = $this->comment;
        $ask->save();
        $this->comment = "";
        $this->ask_modal = false;
    }

    public function render()
    {
        return view('livewire.landing.service.teachers-info')->layout('layouts.landing');
    }
}
