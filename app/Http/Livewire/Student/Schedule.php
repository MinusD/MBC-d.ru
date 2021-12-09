<?php

namespace App\Http\Livewire\Student;

use App\Models\Group;
use App\Models\LonelyStudentGroup;
use App\Models\PublicGroupSlug;
use App\Models\Subject;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Schedule extends Component
{
    public $modal_set = false;
    public $group_name = '';
    public $modal_group_name;
    public $search_error = false;
    public $lessons_time;
    public $current_week;
    public $lessons = [];
    public $current_day;
    public $show_date;
    public $date;
    public $show_week;
    public $timetable;
    public $group_id;


    public function next_week()
    {
        $this->show_week++;
        $this->date = strtotime('+1 week', $this->date);
        $this->show_date = $this->date;
        $this->load_data();
    }

    public function current_week()
    {
        $this->show_week = $this->current_week;
        $this->date = strtotime('monday this week');
        $this->show_date = $this->date;
        $this->load_data();
    }

    public function previous_week()
    {
        if ($this->show_week != 1) {
            $this->show_week--;
            $this->date = strtotime('-1 week', $this->date);
            $this->show_date = $this->date;
        } else {
            return;
        }
        $this->load_data();
    }


    public function get_group_data()
    {
        if (is_null(\Auth::user()->group_id)) {
            $g = PublicGroupSlug::find(LonelyStudentGroup::where('user_id', \Auth::id())->first()->public_group_id)->group_slugs;
        } else {
            $g = Group::find(\Auth::user()->group_id)->group_name;
        }
        $path = env('API_SERVER') . 'groups/certain?name=' . urlencode($g);
        $path2 = env('API_SERVER') . 'time/week';
        $this->timetable = json_decode(file_get_contents($path), true)[0];
        $this->current_week = json_decode(file_get_contents($path2), true);
        $this->lessons_time = $this->timetable['lessonsTimes'][0];
        $this->show_week = $this->current_week;
        $this->load_data();
    }

    public function load_data()
    {
        $this->lessons = [];
        if ($this->show_week % 2 == 1) {
            $c = 'odd';
        } else {
            $c = 'even';
        }
        foreach ($this->timetable['schedule'] as $key => $day) {
            $d = ucfirst($day['day']);
            $day = $day[$c];
            $data = array();
            foreach ($day as $key2 => $para) {
                foreach ($para as $key3 => $lesson) {
                    if (is_null($lesson['weeks']) or in_array($this->show_week, $lesson['weeks'])) {
                        if (!is_null($this->group_id)) {
                            $subject = Subject::where('group_id', $this->group_id)->where('title', $lesson['name'])->firstOrCreate(['group_id' => $this->group_id, 'title' => $lesson['name']])->id;
                        } else {
                            $subject = 0;
                        }
                        array_push($data, ['n' => $key2, 'name' => $lesson['name'], 'tuter' => $lesson['tutor'],
                            'place' => $lesson['place'], 'type' => $lesson['type'], 'hw' => \App\Models\Homework::where('to_date', date("Y-m-d H:i:s", $this->show_date))->where('subject_id', $subject)->get()]);
                    }
                }
                if ($key2 == 5) {
                    array_push($this->lessons, ['day_name' => $d, 'data' => $data, 'date' => date("d.m.Y", $this->show_date)]);
                    $this->show_date = strtotime('+1 day', $this->show_date);
                    unset($data);
                }
            }
//            dd($this->show_date);
//            if (\App\Models\Homework::where('to_date', date("Y-m-d H:i:s", $this->show_date))->exists()){
//               dd( \App\Models\Homework::where('to_date', $this->show_date)->get());
//            }
        }
//        dd($this->lessons);
    }


    public function mount()
    {
            $this->group_id = \Auth::user()->group_id;


        $this->current_day = getdate()['wday'] - 1;
        $this->date = strtotime('monday this week');
        $this->show_date = $this->date;
        $this->get_group_data();

    }


    public function render()
    {
        return view('livewire.student.schedule')->layout('layouts.student');
    }
}
