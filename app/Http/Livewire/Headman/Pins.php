<?php

namespace App\Http\Livewire\Headman;

use App\Models\Group;
use Livewire\Component;
use WireUi\Traits\Actions;

class Pins extends Component
{
    use Actions;
    public $info_modal = false;
    public $new_pincode;
    public $data = [];
    public $pin_error = false;
    public $f = 0;

    public function mount() {
        $this->data = Group::where('headman_id', \Auth::id())->first();
    }

    public function activate_fs(){
        $p = preg_replace('/[^0-9]/', '',  $this->data->group_name);
        $s = 1;
        $n = $s . $p;
        while (Group::where('fs_code', $n)->exists()){
            $s += 1;
            $n = $s . $p;
        }
        $this->data->fs_code = $n;
        $this->data->fs_pass = mt_rand(10000, 99999);
        $this->data->save();

    }

    public function deactivate_fs(){
        $this->data->fs_code = null;
        $this->data->fs_pass = null;
        $this->data->save();
    }

    public function openModal(){
        $this->info_modal = true;
    }

    public function new_folder(){

    }
    public function new_pin(){

    }

    public function save_new_pincode(){
        if ($this->new_pincode >= 10000 and $this->new_pincode <= 99999){
            $this->pin_error = false;
            $this->data->fs_pass = $this->new_pincode;
            $this->data->save();
            $this->new_pincode = '';
        } else {
            $this->pin_error = true;
        }
    }

    public function render()
    {
        return view('livewire.headman.pins')->layout('layouts.headman');
    }
}
