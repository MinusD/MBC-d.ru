<?php

namespace App\Http\Livewire\Headman;

use App\Models\TokenGroupExtension;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;

class Services extends Component
{
    use Actions;
    public $modal_token_menu = false;
    public $modal_fast_student = false;
    public $modal_fast_student_next = false;
    public $fast_student_primary_data;
    public $fast_student_data = [];
    public $token = "";
    public $act = "";

    protected $queryString = [
        'act' => ['except' => ''],
    ];

    public function open_fast_student_modal(){
        $this->modal_fast_student = true;
    }

    public function fast_student_next(){
        $string = $this->fast_student_primary_data;
        $this->fast_student_data = [];
        $separator = " \t\n";
        $array_words = [];
        $tok = strtok($string, $separator);
        while($tok) {
            $array_words[] = $tok;
            $tok = strtok($separator);
        }
        $tmp = [];
        foreach ($array_words as $el) {
            if ($el != '.'){
                array_push($tmp, $el);
            } else {
                array_push($tmp, " ");
            }
            if(count($tmp) == 3){
                array_push($this->fast_student_data, $tmp);
                $tmp = [];
            }
        }
        if (count($this->fast_student_data) != 0){
            $this->modal_fast_student = false;
            $this->modal_fast_student_next = true;
            $this->fast_student_primary_data = "";
        }
    }

    public function delete_user($key){
        unset($this->fast_student_data[$key]);
    }

    public function fast_student_final(){
        $group_id = Auth::user()->group_id;
        foreach ($this->fast_student_data as $u) {
            $user = new User();
            $user->name = $u[0];
            $user->sname = $u[1];
            $user->pname = $u[2];
            $user->group_id = $group_id;
            $user->save();
        }
        $this->fast_student_data = [];
        $this->modal_fast_student_next = false;
        $this->notification()->success(
            $title = 'Студенты добавлены',
            $description = 'Все студенты успешно добавлены в группу'
        );
    }

    public function open_token_menu()
    {
        if (TokenGroupExtension::whereGroup_id(Auth::user()->group_id)->exists()) {
           $this->token = TokenGroupExtension::whereGroup_id(Auth::user()->group_id)->first('token')->token;
        }
        $this->modal_token_menu = true;
    }
    public function regenerate_token(){
        try {
            TokenGroupExtension::whereGroup_id(Auth::user()->group_id)->delete();
            $this->generate_token();
        } catch (\Exception $e) {
            $this->redirect(route('headman.services'));
        }
    }
    public function deactivate_token(){
        try {
            TokenGroupExtension::whereGroup_id(Auth::user()->group_id)->delete();
            $this->modal_token_menu = false;
            $this->token = "";
        } catch (\Exception $e) {
            $this->redirect(route('headman.services'));
        }
    }

    public function mount(){
        if (mb_strlen($this->act) > 1){
            if ($this->act == 'app-token'){
                $this->open_token_menu();
            } elseif ($this->act == 'fast-group') {
                $this->open_fast_student_modal();
            }
        }
        $this->act = "";
    }

    public function generate_token()
    {
        $permitted_chars =
            '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' .
            '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' .
            '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' .
            '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' .
            '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $i = substr(str_shuffle($permitted_chars), 0, 30);
        while (TokenGroupExtension::where('token', $i)->exists()) {
            $i = substr(str_shuffle($permitted_chars), 0, 30);
        }
        $token = new TokenGroupExtension();
        $token->group_id = Auth::user()->group_id;
        $token->token = $i;
        $token->save();
        $this->token = $i;
    }


    public function render()
    {
        return view('livewire.headman.services')->layout('layouts.headman');
    }
}
