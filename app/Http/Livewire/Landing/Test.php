<?php

namespace App\Http\Livewire\Landing;

use App\Models\Group;
use Auth;
use Livewire\Component;

class Test extends Component
{
    public $fs_code;


    public function add()
    {
        $group = Group::find(1);
        $group->users()->attach(Auth::id());
//        Auth::user()->group()->atta
    }

    public function go()
    {
        if ($this->fs_code == 16479) {
            $data = ['fs_code' => $this->fs_code, 'association' => ['y_disk' => 'https://disk.yandex.ru/d/U6qKYq25NOBm8w'],
                'data_type' => 'faker', 'message' => 'dev-page', 'version' => NULL,
                'custom_message' => "На странице представлены данные, сугубо для тестирование, реальная структура данных не совпадает с текущей, не используйте данный ответ в качества шаблонного!"];
            dd($data);
        } elseif ($this->fs_code == 164790){
            return $this->redirect('https://disk.yandex.ru/d/U6qKYq25NOBm8w');
        }
    }

    public function render()
    {
        return view('livewire.landing.test')->layout('layouts.landing');
    }
}
