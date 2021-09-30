<?php

namespace App\Http\Livewire\Headman;

use App\Models\Folder;
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
    public $new_folder_name = "";
    public $new_folder_desc = "";
    public $new_folder_modal = false;
    public $new_pin_modal = false;
    public $folders = [];

    protected $rules = [
        'new_folder_name' => 'required|min:2|max:120',
        'new_folder_desc' => 'max:180',
    ];

    protected $messages = [
        'new_folder_name.required' => 'Введите название.',
        'new_folder_name.min' => 'Слишком короткое название',
        'new_folder_name.max' => 'Слишком длинное название',
        'new_folder_desc.max' => 'Слишком длинное описание',
    ];

//    protected $queryString = [
//        'f' => ['except' => ''],
//    ];


    public function mount()
    {
        $this->data = Group::where('headman_id', \Auth::id())->first();
        $this->get_data();
    }

    public function get_data()
    {
        if ($this->f == 0) {
            $this->folders = Folder::where('type', 'group')->where('parent_id', $this->data->id)->get();
        } else {
            $this->folders = Folder::where('type', 'folder')->where('parent_id', $this->f)->get();
        }
    }

    public function go_folder($id)
    {
        $this->f = $id;
        $this->get_data();
    }

    public function activate_fs()
    {
        $p = preg_replace('/[^0-9]/', '', $this->data->group_name);
        $s = 1;
        $n = $s . $p;
        while (Group::where('fs_code', $n)->exists()) {
            $s += 1;
            $n = $s . $p;
        }
        $this->data->fs_code = $n;
        $this->data->fs_pass = mt_rand(10000, 99999);
        $this->data->save();

    }

    public function deactivate_fs()
    {
        $this->data->fs_code = null;
        $this->data->fs_pass = null;
        $this->data->save();
    }

    public function openModal()
    {
        $this->info_modal = true;
    }

    public function new_folder()
    {
        $this->new_folder_modal = true;
    }

    public function new_pin()
    {
        $this->new_pin_modal = true;
    }

    public function new_folder_confirm()
    {
        $this->validateOnly('new_folder_name');
        $this->validateOnly('new_folder_desc');
        $folder = new Folder();
        $folder->name = $this->new_folder_name;
        $folder->desc = $this->new_folder_desc;
        if ($this->f == 0){
            $folder->type = 'group';
            $folder->parent_id = $this->data->id;
        } else {
            $folder->type = 'folder';
            $folder->parent_id = $this->f;
        }
        $folder->save();
        $this->new_folder_modal = false;
        $this->get_data();
        $this->new_folder_name = '';
        $this->new_folder_desc = '';
        
    }

    public function save_new_pincode()
    {
        if ($this->new_pincode >= 10000 and $this->new_pincode <= 99999) {
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
