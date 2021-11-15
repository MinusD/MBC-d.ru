<?php

namespace App\Http\Livewire\Student;

use App\Models\StudentCompletedHomework;
use App\Models\Subject;
use Livewire\Component;
use WireUi\Traits\Actions;

class Homework extends Component
{
    use Actions;
    public $act;
    public $add_homework_modal_is_open = false;
    public $subjects = [];
    public $selected_subject = 0;
    public $homework_text = "";
    public $homework_to_date;
    public $homeworks = [];
    public $group_id;

    public $search = '';
    public $all = true;
    public $mobile_modal_select_subject = false;
    public $filter_subject = "-1";
    public $confirm_subject_id = 0;

    public $show_homework_modal_is_open = false;
    public $show_homework;
    public $show_homework_subject;

    protected $rules = [
        'homework_to_date' => 'required',
    ];
    protected $messages = [
        'homework_to_date.required' => "На какое число домашка?"
    ];
    protected $queryString = [
        'act' => ['except' => ''],
        'search' => ['except' => ''],
    ];

    public function open_homework($key)
    {
        $this->show_homework_modal_is_open = true;
        $this->show_homework = $this->homeworks[$key];
        $this->show_homework_subject = Subject::find($this->show_homework->subject_id, ['title'])->title;
    }

    public function show_unc()
    {
        $this->all = false;
    }

    public function show_all()
    {
        $this->all = true;
    }

    public function open_subjects_modal()
    {
        $this->mobile_modal_select_subject = true;
    }

    public function select_filter_subject()
    {
        if ($this->filter_subject == "-1") {
            $this->confirm_subject_id = 0;
        } else {
            $this->confirm_subject_id = $this->subjects[(int)$this->filter_subject]->id;
        }
        $this->mobile_modal_select_subject = false;
    }

    public function load_homeworks()
    {
        $homeworks = \App\Models\Homework::where('group_id', $this->group_id);
        if (mb_strlen($this->search) > 1) {
            $homeworks->where('text', 'like', '%' . $this->search . '%');
        }
//        dd($this->confirm_subject_id);
        if ($this->confirm_subject_id != 0) {
            $homeworks->where('subject_id', $this->confirm_subject_id);
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
        $this->subjects = Subject::where('group_id', $this->group_id)->get();
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
        $this->notification()->success(
            $title = 'Готово!',
            $description = 'Домашнее задание предложено'
        );
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
    }

    public function render()
    {
        $this->load_homeworks();
        return view('livewire.student.homework')->layout('layouts.student');
    }

}
