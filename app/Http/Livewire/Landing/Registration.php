<?php

namespace App\Http\Livewire\Landing;

use App\Models\Group;
use App\Models\LonelyStudentGroup;
use App\Models\PublicGroupSlug;
use App\Models\StudentGroupInvite;
use App\Models\User;
use Livewire\Component;
use Auth;

class Registration extends Component
{

    public $redirect_data;
    public $name;
    public $sname;
    public $pname;
    public $email;
    public $step = 1;
    public $st = true;
    public $group_slug;
    public $groups = [];
    public $confirm_group = [];
    public $group_search_error = false;
    public $isset_groups_list = [];
    public $confirm_group_id = 0;
    public $pass;
    public $pass_2;


    protected $rules = [
        'name' => 'required|min:2|max:25',
        'sname' => 'required|min:2|max:25',
        'pname' => 'max:25',
        'email' => 'required|unique:users|email',
        'pass' => 'required|min:8|max:50|required_with:pass_2',
        'pass_2' => 'required|same:pass',

    ];

    protected $messages = [
        'name.required' => 'Введите Имя',
        'name.min' => 'Слишком короткое имя',
        'name.max' => 'Слишком длинное имя',
        'sname.required' => 'Введите фамилию',
        'sname.min' => 'Слишком короткая фамилия',
        'sname.max' => 'Слишком длинная фамилия',
        'pname.min' => 'Слишком короткое отчество',
        'pname.max' => 'Слишком длинное отчество',
        'email.required' => 'Введите Email',
        'email.email' => 'Введите Email, а не абракадабру ',
        'email.unique' => 'Данные Email уже зарегистрирован',
        'pass.required' => 'Введите пароль',
        'pass.min' => 'Слишком короткий пароль! Минимальная длина 8 символов',
        'pass.max' => 'Слишком длинный пароль!!!',
        'pass.required_with' => 'Пароли не совпадают',
        'pass_2.required' => 'Подтвердите пароль',
        'pass_2.same' => 'Пароли не совпадают',
    ];

    protected $queryString = [
        'redirect_data' => ['except' => ''],
    ];

    public function reg_by_headman()
    {
        $this->validate();
        $user = new User();
        $user->name = trim($this->name);
        $user->sname = trim($this->sname);
        $user->pname = trim($this->pname);
        $user->email = trim($this->email);
        $user->password = \Hash::make($this->pass);
        $user->assignRole('student');
        $user->assignRole('headman');
        $user->save();
        auth()->login($user);
        $group = new Group();
        $group->headman_id = $user->id;
        $group->group_name = $this->confirm_group['groupName'];
        $group->save();
        $user->group_id = $group->id;
        $user->save();
        return redirect(route('headman.dashboard'));
    }

    public function reg_by_student()
    {
        $this->validate();
        $user = new User();
        $user->name = trim($this->name);
        $user->sname = trim($this->sname);
        $user->pname = trim($this->pname);
        $user->email = trim($this->email);
        $user->password = \Hash::make($this->pass);
        $user->assignRole('student');
        $user->save();
        $inv = new StudentGroupInvite();
        $inv->group_id = $this->confirm_group_id;
        $inv->user_id = $user->id;
        $inv->save();
        $solo = new LonelyStudentGroup();
        $solo->user_id = $user->id;
        $g = Group::find($this->confirm_group_id, ['group_name'])->group_name;
        $solo->public_group_id = PublicGroupSlug::where('group_slugs', $g)->firstOrCreate(['group_slugs' => $g], ['id'])->id;
        $solo->save();
        auth()->login($user);
        return redirect(route('student.dashboard'));
    }

    public function search_group()
    {
        $tmp = $this->groups;
        $key = array_search(
            $this->group_slug,
            array_column($tmp, 'groupName')
        );
        dd($this->groups[$key]);
    }

    public function search_group_by_student()
    {
        $this->group_slug = mb_strtoupper($this->group_slug);
        $this->confirm_group_id = 0;
        $groups = Group::where('group_name', $this->group_slug)->get();
        $this->isset_groups_list = [];
        foreach ($groups as $group) {
            $h = User::find($group->headman_id, ['name', 'sname', 'pname']);
            array_push($this->isset_groups_list, ['id' => $group->id, 'group_name' => $group->group_name, 'headman' => $h->sname . ' ' . $h->name . ' ' . $h->pname]);
        }
        $this->group_search_error = false;
        if (count($this->isset_groups_list) == 1) {
            $this->confirm_group_id = $this->isset_groups_list[0]['id'];
        } elseif (count($this->isset_groups_list) == 0) {
            $this->group_search_error = true;
        }
    }

    public function select_group_by_student($key)
    {
        $this->confirm_group_id = $this->isset_groups_list[$key]['id'];
    }


    public function search_group_by_headman()
    {
        $this->group_slug = mb_strtoupper($this->group_slug);

        $path = env('API_SERVER') . 'groups/all';
        $this->groups = json_decode(file_get_contents($path));
        $tmp = $this->groups;
        $key = array_search(
            $this->group_slug,
            array_column($tmp, 'groupName')
        );
        if ($this->groups[$key]->groupName == $this->group_slug) {
            $this->group_search_error = false;
            $this->confirm_group = ['groupName' => $this->groups[$key]->groupName, 'groupSuffix' => $this->groups[$key]->groupSuffix];
        } else {
            $this->confirm_group = [];
            $this->group_search_error = true;
        }
    }


    public function mount()
    {
        if (!is_null($this->redirect_data)) {
            echo 'redirect';
        }
    }


    public function render()
    {
        return view('livewire.landing.registration')->layout('layouts.landing');
    }
}
