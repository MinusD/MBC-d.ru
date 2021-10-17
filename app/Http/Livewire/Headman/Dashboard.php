<?php

namespace App\Http\Livewire\Headman;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $students = [];
    public $group;
    public $add_student_modal_is_open = false;
    public $new_stunent_name = "";
    public $new_stunent_sname = "";
    public $new_stunent_pname = "";

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

    public function mount(){
        $this->group = Group::where('headman_id', \Auth::id())->first();
        $this->get_students();
//        dd($this->students);
    }
    public function get_students(){
        $this->students = User::where('group_id', $this->group->id)->get();
    }

    public function open_add_student_modal(){
        if (!$this->add_student_modal_is_open){
            $this->add_student_modal_is_open = true;
        }
    }
    public function act_add_student(){
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



    public function render()
    {
        return view('livewire.headman.dashboard')->layout('layouts.headman');
    }
}
