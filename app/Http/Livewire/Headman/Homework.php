<?php

namespace App\Http\Livewire\Headman;

use App\Models\Group;
use App\Models\OfferHomework;
use App\Models\StudentCompletedHomework;
use App\Models\Subject;
use App\Models\User;
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

    public $edit_homework_modal_is_open = false;
    public $edit_homework;
    public $edit_selected_subject = 0;
    public $edit_homework_text = "";
    public $edit_homework_to_date = 0;
    public $edit_hw_date = false;

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

    public function edit_homework_confirm()
    {
//        dd($this->edit_homework_to_date);
        $this->edit_homework->text = $this->edit_homework_text;
        if ($this->edit_hw_date) {
            $this->edit_homework->to_date = $this->edit_homework_to_date;
        }
        $this->edit_homework->save();
        $this->edit_homework_modal_is_open = false;
        $this->notification()->success(
            $title = 'Готово!',
            $description = 'Домашнее задание изменено'
        );
    }

    public function edit_homework($key)
    {
        $this->edit_hw_date = false;
        $this->edit_homework = $this->homeworks[$key];
        $this->edit_selected_subject = Subject::find($this->edit_homework->subject_id, ['title'])->title;
        $this->edit_homework_text = $this->edit_homework->text;
        $this->edit_homework_modal_is_open = true;
    }

    public function edit_homework_date_btn($p)
    {
        $this->edit_hw_date = $p;
    }

    public function delete_homework($key)
    {
        $this->homeworks[$key]->delete();
        $this->notification()->success(
            $title = 'Готово!',
            $description = 'Домашнее задание удалено'
        );
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

    public function reset_subject()
    {
        $this->confirm_subject_id = 0;
        $this->filter_subject = -1;
        $this->mobile_modal_select_subject = false;
    }

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
        }
//        dd($this->confirm_subject_id);
        if ($this->confirm_subject_id != 0) {
            $homeworks->where('subject_id', $this->confirm_subject_id);
        }

        $this->homeworks = $homeworks->latest('to_date')->get();
        foreach ($this->homeworks as $key => $homework) {
            if (StudentCompletedHomework::where('homework_id', $homework->id)->where('user_id', \Auth::id())->exists()) {
                $this->homeworks[$key]->setAttribute('done', true);
            } else {
                $this->homeworks[$key]->setAttribute('done', false);
            }
            $this->homeworks[$key]->setAttribute('subject', Subject::find($homework->subject_id, ['title'])->title);
        }
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
            $description = 'Домашнее задание добавлено'
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

    public function render()
    {
        $this->load_homeworks();
        return view('livewire.headman.homework')->layout('layouts.headman');
    }
}
