<?php

namespace App\Http\Livewire\Headman;

use App\Models\Group;
use App\Models\GroupInvites;
use App\Models\OfferHomework;
use App\Models\StudentGroupInvite;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class Dashboard extends Component
{
    use Actions;

    public $students = [];
    public $group;
    public $add_homework_modal_is_open = false;
    public $invite_link_edit_model_is_open = false;
    public $delete_user_confirm_modal_is_open = false;
    public $edit_user_modal_is_open = false;
    public $add_student_modal_is_open = false;


    public $deleted_user_data;
    public $new_stunent_name = "";
    public $new_stunent_sname = "";
    public $new_stunent_pname = "";
    public $invite;
    public $group_applications_counter;
    public $homeworks_applications_counter = 0;
    public $current_edit_user_id;


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
        $this->group_applications_counter = StudentGroupInvite::where('group_id', $this->group->id)->where('status', 'wait')->count();
        $this->homeworks_applications_counter = OfferHomework::where('group_id', $this->group->id)->count();
        $this->get_students();
    }

    public function get_students()
    {
        $this->students = User::where('group_id', $this->group->id)->get()->sortBy('sname');
    }

    public function open_add_student_modal()
    {
        $this->add_student_modal_is_open = true;
    }

    public function open_edit_student_modal($key)
    {
        $this->current_edit_user_id = $this->students[$key]->id;
        $this->new_stunent_name = $this->students[$key]->name;
        $this->new_stunent_pname = $this->students[$key]->pname;
        $this->new_stunent_sname = $this->students[$key]->sname;
        $this->edit_user_modal_is_open = true;
    }

    public function confirm_edit_modal()
    {
        $this->validateOnly('new_stunent_sname');
        $this->validateOnly('new_stunent_name');
        $this->validateOnly('new_stunent_pname');
        $u = User::find($this->current_edit_user_id);
        $u->name = $this->new_stunent_name;
        $u->sname = $this->new_stunent_sname;
        $u->pname = $this->new_stunent_pname;
        $u->save();
        $this->edit_user_modal_is_open = false;
        $this->get_students();

    }

    public function clear_news_labels()
    {
        $this->clearValidation();
        $this->new_stunent_name = "";
        $this->new_stunent_pname = "";
        $this->new_stunent_sname = "";

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

    public function generate_new_invite_link()
    {
        $this->invite->delete();
        $this->generate_invite();
    }

    public function deactivate_invite_link()
    {
        $this->invite_link_edit_model_is_open = false;
        $this->invite->delete();
    }

    public function delete_user($id)
    {
        $this->delete_user_confirm_modal_is_open = true;
        $this->deleted_user_data = User::find($id);
        if ($this->group->id != $this->deleted_user_data->group_id) {
            dd("gg");
        } else {
            $this->dialog()->confirm([
                'title' => 'Вы уверены что хотите удалить студента?',
                'description' => $this->deleted_user_data->sname . ' ' . $this->deleted_user_data->name . ' ' . $this->deleted_user_data->pname . ' - этот пользователь потеряет доступ к данным группы!',
                'icon' => 'error',
                'accept' => [
                    'label' => 'Да, я уверен',
                    'method' => 'delete_user_confirm',
                    'params' => 'Saved',
                ],
                'reject' => [
                    'label' => 'Нет, не уверен',
                ],
            ]);
        }
    }

    public function delete_user_confirm()
    {
        if (is_null($this->deleted_user_data->password)) {
            $this->deleted_user_data->delete();
        } else {
            $this->deleted_user_data->group_id = null;
            $this->deleted_user_data->save();
        }
        $this->get_students();
    }

    public function generate_invite()
    {
        $permitted_chars =
            '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' .
            '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' .
            '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
