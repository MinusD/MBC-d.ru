<?php

namespace App\Http\Livewire\Landing;

use App\Models\Group;
use Livewire\Component;

class Fastshare extends Component
{

    public $fs_code;
    public $fs_pass;
    public $fs_is_correct = false;


    public function checker()
    {
        if (strlen($this->fs_code) == 6) {
            $this->go();
            $this->fs_is_correct = false;

        } elseif (strlen($this->fs_code) == 5) {
            $fs = Group::where('fs_code', $this->fs_code)->first(['id', 'fs_code', 'fs_pass']);
            if (isset($fs->fs_pass)) {
                $this->fs_is_correct = true;
                if ($this->fs_pass == $fs->fs_pass) {

                    dd(123);
                }
            } else {
                $this->fs_is_correct = false;
            }
        }
    }
//    public function load_group_fs(){
//
//    }

    public function go1()
    {
        if (strlen($this->fs_code) == 6) {
            return;
        }
    }

    public function go()
    {
        if ($this->fs_code == 16479) {
            $data = ['fs_code' => $this->fs_code, 'association' => ['y_disk' => 'https://disk.yandex.ru/d/U6qKYq25NOBm8w'],
                'data_type' => 'faker', 'message' => 'dev-page', 'version' => NULL,
                'custom_message' => "На странице представлены данные, сугубо для тестирование, реальная структура данных не совпадает с текущей, не используйте данный ответ в качества шаблонного!"];
            dd($data);
        } elseif ($this->fs_code == 164790) {
            $this->fs_code = '';
            return $this->redirect('https://disk.yandex.ru/d/U6qKYq25NOBm8w');
        } elseif ($this->fs_code == "012113") {
            return $this->redirect('https://mbc-d.ru/r/ikbo-files');
        }
    }

    public function render()
    {
        return view('livewire.landing.fastshare')->layout('layouts.landing');
    }
}
