<?php

namespace App\Http\Livewire\Headman;

use App\Models\Group;
use App\Models\StudentCompletedHomework;
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
    public $search = '';

    protected $rules = [
        'homework_to_date' => 'required',
    ];
    protected $messages = [
        'homework_to_date.required' => "На какое число домашка?)"
    ];
    protected $queryString = [
        'act' => ['except' => ''],
        'search' => ['except' => ''],
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
        $this->subjects = Subject::where('group_id', $this->group_id)->get();
    }

    public function load_homeworks()
    {
        $homeworks = \App\Models\Homework::where('group_id', $this->group_id);
        if (mb_strlen($this->search) > 1) {
            $homeworks->where('text', 'like', '%' . $this->search . '%');
//            dd($homeworks);
        }

        $this->homeworks = $homeworks->get();
        foreach ($this->homeworks as $key => $homework) {
            if (StudentCompletedHomework::where('homework_id', $homework->id)->where('user_id', \Auth::id())->exists()) {
                $this->homeworks[$key]->setAttribute('done', true);
            } else {
                $this->homeworks[$key]->setAttribute('done', false);
            }
            $this->homeworks[$key]->setAttribute('subject', Subject::find($homework->subject_id, ['title'])->title);
        }
    }

    public function mount()
    {
        $this->group_id = \Auth::user()->group_id;
        if ($this->act == "add-homework") {
            $this->act = "";
            $this->open_add_homework_modal();
        }
        $this->load_homeworks();
    }

    public function open_add_homework_modal()
    {
        $this->add_homework_modal_is_open = true;
        if (Subject::where('group_id', $this->group_id)->count() < 5) {
            $this->reload_subjects();
        }
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
        $this->load_homeworks();
    }

    public function compete_homework($key)
    {
        $cc = new StudentCompletedHomework();
        $cc->homework_id = $this->homeworks[$key]->id;
        $cc->user_id = \Auth::id();
        $cc->save();
//        $this->load_homeworks();
    }

    public function uncompete_homework($key)
    {
        $cc = StudentCompletedHomework::where('homework_id', $this->homeworks[$key]->id)->where('user_id', \Auth::id())->first();
        if (isset($cc->id)) {
            $cc->delete();
        }
//        $this->load_homeworks();
    }

    public function render()
    {
        $this->load_homeworks();
        return view('livewire.headman.homework')->layout('layouts.headman');
    }
}
