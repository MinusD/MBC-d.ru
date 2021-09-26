<?php

namespace App\Http\Livewire\Student;

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


    public function get_group_data()
    {
        $path = env('API_SERVER') . 'groups/certain?name=' . urlencode("ИКБО-30-21");
        $path2 = env('API_SERVER') . 'time/week';
        $timetable = json_decode(file_get_contents($path), true)[0];
        $this->current_week = json_decode(file_get_contents($path2), true);
        $this->lessons_time = $timetable['lessonsTimes'][0];
        if ($this->current_week % 2 == 1) {
            $c = 'odd';
        } else {
            $c = 'even';
        }
        foreach ($timetable['schedule'] as $key => $day) {
            $d = ucfirst($day['day']);
            $day = $day[$c];
            $data = array();
            foreach ($day as $key2 => $para) {
                foreach ($para as $key3 => $lesson) {
                    if (is_null($lesson['weeks']) or in_array($this->current_week, $lesson['weeks'])) {
                        array_push($data, ['n' => $key2, 'name' => $lesson['name'], 'tuter' => $lesson['tutor'],
                            'place' => $lesson['place'], 'type' => $lesson['type']]);
                    }
                }
                if ($key2 == 5 and !isset($p_list['day_name'])) {
                    array_push($this->lessons, ['day_name' => $d, 'data' => $data]);
                    unset($data);
                }
            }
        }
    }


    public function mount()
    {
        $this->current_day = getdate()['wday'] - 1;
        //$this->modal_group_name =  $this->group_name;
        $this->get_group_data();

    }



    public function render()
    {
        return view('livewire.student.schedule')->layout('layouts.student');
    }
}
