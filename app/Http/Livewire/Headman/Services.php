<?php

namespace App\Http\Livewire\Headman;

use App\Models\TokenGroupExtension;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Services extends Component
{
    public $modal_token_menu = false;
    public $token = "";
    public $act = "";

    protected $queryString = [
        'act' => ['except' => ''],
    ];

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
            } else {

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
