<?php

namespace App\Http\Livewire\Landing;

use App\Models\GroupInvites;
use App\Models\User;
use Livewire\Component;

class RegByCode extends Component
{
    public $t;
    public $invite;
    public $users;
    public $student_id;
    public $selected_user_key = 0;

    public $email;
    public $pass;
    public $pass_2;

    protected $rules = [
        'email' => 'required|unique:users|email',
        'pass' => 'required|min:8|max:50|required_with:pass_2',
        'pass_2' => 'required|same:pass',
    ];

    protected $messages = [
        'email.required' => 'Введите Email',
        'email.email' => 'Введите Email, а не абракадабру ',
        'email.unique' => 'Данные Email уже зарегистрирован',
        'pass.required' => 'Введите пароль',
        'pass.min' => 'Слишком короткий пароль! Минимальная длинна 8 символов',
        'pass.max' => 'Слишком длинный пароль!!!',
        'pass.required_with' => 'Пароли не совпадают',
        'pass_2.required' => 'Подтвердите пароль',
        'pass_2.same' => 'Пароли не совпадают',
    ];


    protected $queryString = [
        't' => ['except' => ''],
    ];

    public function register()
    {
        $this->validate();
        $user = User::find($this->users[$this->selected_user_key]->id);
        $user->email = $this->email;
        $user->password = \Hash::make($this->pass);
        $user->save();
        $user->assignRole('student');
        auth()->login($user);
        return redirect(route('student.dashboard'));
    }


    public function mount()
    {
        if (isset($this->t)) {
            $this->invite = GroupInvites::where('token', $this->t)->first();
            if (isset($this->invite->group_id)) {
                $this->users = User::where('group_id', $this->invite->group_id)->whereNull('password')->get();
                if (count($this->users) == 0) {
                    abort(403);
                    dd("Все зарегистрированны!");
                }
            } else {
                abort(403);
                dd("Токена не существует или он просрочен");
            }
        } else {
            abort(401);
        }
    }

    public function render()
    {
        return view('livewire.landing.reg-by-code')->layout('layouts.landing');
    }
}
