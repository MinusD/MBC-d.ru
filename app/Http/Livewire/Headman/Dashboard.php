<?php

namespace App\Http\Livewire\Headman;

use App\Models\Group;
use App\Models\GroupInvites;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $students = [];
    public $group;
    public $add_student_modal_is_open = false;
    public $add_homework_modal_is_open = false;
    public $invite_link_edit_model_is_open = false;
    public $new_stunent_name = "";
    public $new_stunent_sname = "";
    public $new_stunent_pname = "";
    public $invite;

    protected $rules = [
        'new_stunent_name' => 'required|min:2|max:25',
        'new_stunent_sname' => 'required|min:2|max:25',
        'new_stunent_pname' => 'max:25',
    ];

    protected $messages = [
        'new_stunent_name.required' => 'Введите Имя',
        'new_stunent_name.min' => 'Слишком короткое имя',
        'new_stunent_name.max' => 'Слишком длинное имя',
        'new_stunent_sname.required' => 'Введите фамилию',
        'new_stunent_sname.min' => 'Слишком короткая фамилия',
        'new_stunent_sname.max' => 'Слишком длинная фамилия',
        'new_stunent_pname.min' => 'Слишком короткое отчество',
        'new_stunent_pname.max' => 'Слишком длинное отчество',
    ];

    public function mount()
    {
        $this->group = Group::where('headman_id', \Auth::id())->first();
        $this->get_students();
//        dd($this->students);
    }

    public function get_students()
    {
        $this->students = User::where('group_id', $this->group->id)->get()->sortBy('sname');
    }

    public function open_add_student_modal()
    {
        $this->add_student_modal_is_open = true;
    }
    public function open_add_homework_modal()
    {
        $this->add_homework_modal_is_open = true;
    }

    public function open_invite_link_edit_modal()
    {
        if (!isset($this->invite)) {
            $this->invite = GroupInvites::whereGroup_id($this->group->id)->first();
        }
        $this->invite_link_edit_model_is_open = true;
    }

    public function act_add_student()
    {
        $this->validateOnly('new_stunent_sname');
        $this->validateOnly('new_stunent_name');
        $this->validateOnly('new_stunent_pname');
        $user = new User();
        $user->name = $this->new_stunent_name;
        $user->sname = $this->new_stunent_sname;
        $user->pname = $this->new_stunent_pname;
        $user->group_id = $this->group->id;
        $user->save();
        $this->add_student_modal_is_open = false;
        $this->new_stunent_name = "";
        $this->new_stunent_sname = "";
        $this->new_stunent_pname = "";
        $this->get_students();
    }

    public function generate_new_invite_link(){
        $this->invite->delete();
        $this->generate_invite();
    }

    public function deactivate_invite_link(){
        $this->invite_link_edit_model_is_open = false;
        $this->invite->delete();
//        unset($this->invite);
//        $this->invite->token = 0;
//        dd($this->invite);
//        dd(isset($this->invite->token));
    }

    public function generate_invite()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' . '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' . '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $i = substr(str_shuffle($permitted_chars), 0, 30);
//        while (GroupInvites::where('token', $i)->where('deleted_at', !null)->exists()) {
//        dd(GroupInvites::all());
        while (GroupInvites::where('token', $i)->exists()) {
            $i = substr(str_shuffle($permitted_chars), 0, 30);
        }
        $inv = new GroupInvites();
        $inv->token = $i;
        $inv->group_id = $this->group->id;
        $inv->save();
        $this->invite = $inv;
//        $this->invite_link_edit_model_is_open = false;
    }


    public function render()
    {
        return view('livewire.headman.dashboard')->layout('layouts.headman');
    }
}
