<?php

namespace App\Http\Livewire\Headman;

use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;

class Homework extends Component
{
    public $act;
    public $add_homework_modal_is_open = false;
    public $subjects = [];
    public $selected_subject = 0;
    public $homework_text = "";
    public $homework_to_date;
    public $homeworks = [];
    public $group_id;

    protected $rules = [
        'homework_to_date' => 'required',
    ];
    protected $messages = [
        'homework_to_date.required' => "На какое число домашка?)"
    ];
    protected $queryString = [
        'act' => ['except' => ''],
    ];

    public function reload_subjects()
    {
        $path = env('API_SERVER') . 'groups/certain?name=' . urlencode(Group::find($this->group_id, 'group_name')->group_name);
        $timetable = json_decode(file_get_contents($path), true)[0]['schedule'];
        foreach ($timetable as $day) {
            foreach ($day['odd'] as $para) {
                foreach ($para as $item) {
                    Subject::where('group_id', $this->group_id)->where('title', $item['name'])->firstOrCreate(['group_id' => $this->group_id, 'title' => $item['name']]);
                }
            }
            foreach ($day['even'] as $para) {
                foreach ($para as $item) {
                    Subject::where('group_id', $this->group_id)->where('title', $item['name'])->firstOrCreate(['group_id' => $this->group_id, 'title' => $item['name']]);
                }
            }
        }
    }

    public function load_homeworks()
    {
        $homeworks = \App\Models\Homework::where('group_id', $this->group_id);
        $this->homeworks = $homeworks->get();
    }

    public function mount()
    {
        $this->group_id = \Auth::user()->group_id;
        if ($this->act == "add-homework") {
            $this->add_homework_modal_is_open = true;
            $this->reload_subjects();
            $this->subjects = Subject::where('group_id', $this->group_id)->get();
            $this->act = "";
        }
        $this->load_homeworks();
    }

    public function open_add_homework_modal()
    {
        $this->add_homework_modal_is_open = true;
        $this->reload_subjects();
        $this->subjects = Subject::where('group_id', $this->group_id)->get();
    }

    public function save_homework()
    {
        $this->validate();
        $homework = new \App\Models\Homework();
        $homework->group_id = $this->group_id;
        $homework->subject_id = $this->subjects[(int)$this->selected_subject]->id;
        $homework->text = $this->homework_text;
        $homework->to_date = $this->homework_to_date;
        $homework->save();
        $this->add_homework_modal_is_open = false;
        $this->selected_subject = "0";
        $this->homework_text = "";
    }

    public function render()
    {
        return view('livewire.headman.homework')->layout('layouts.headman');
    }
}
