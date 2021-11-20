<?php

namespace App\Http\Livewire\Headman;

use App\Models\OfferHomework;
use App\Models\Subject;
use Livewire\Component;
use WireUi\Traits\Actions;

class HomeworkApplications extends Component
{
    use Actions;
    public $homeworks;
    public $modal = false;
    public $subject = "";
    public $edit_hw_date = false;
    public $hw;
    public $hw_text = "";
    public $homework_to_date;

    protected $rules = [
        'homework_to_date' => 'required',
    ];
    protected $messages = [
        'homework_to_date.required' => "На какое число домашка?"
    ];

    public function load_data()
    {
        $this->homeworks = OfferHomework::where('group_id', \Auth::user()->group_id)->get();
        foreach ($this->homeworks as $key => $homework) {
            $this->homeworks[$key]->setAttribute('subject', Subject::find($homework->subject_id, ['title'])->title);
        }
        $this->homeworks = $this->homeworks->toArray();
    }

    public function open_offer($key)
    {
        $this->hw = $this->homeworks[$key];
        $this->hw_text = $this->homeworks[$key]['text'];
        $this->modal = true;
    }

    public function reject_hw(){
        OfferHomework::find($this->hw['id'])->delete();
        $this->modal = false;
        $this->load_data();
    }

    public function confirm_homework(){
        $homework = new \App\Models\Homework();
        $homework->group_id = $this->hw['group_id'];
        $homework->subject_id = $this->hw['subject_id'];
        $homework->text = $this->hw_text;
        if ($this->edit_hw_date){
            $this->validate();
            $homework->to_date = $this->homework_to_date;
        } else {
            $homework->to_date = $this->hw['to_date'];
        }
        $homework->save();
        OfferHomework::find($this->hw['id'])->delete();
        $this->modal = false;
        $this->load_data();
        $this->notification()->success(
            $title = 'Готово!',
            $description = 'Домашнее задание добавлено'
        );
    }

    public function edit_homework_date_btn($p)
    {
        $this->edit_hw_date = $p;
    }

    public function mount()
    {
        $this->load_data();
    }

    public function render()
    {
        return view('livewire.headman.homework-applications')->layout('layouts.headman');
    }
}
