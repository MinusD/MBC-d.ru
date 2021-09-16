<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use WireUi\Traits\Actions;

class Schedule extends Component
{
    use Actions;

    public $view_groups;

    public $modal_set = false;
    public $group_name = '';
    public $modal_group_name;
    public $search_error = false;
    public $lessons_time;
    public $current_week;
    public $lessons = [];

    protected $groups_list = [];


    public function openSetModal()
    {
        if($this->modal_set){
            $this->modal_set = false;
        }
        $this->modal_set = true;
    }

    public function save()
    {
        $this->get_groups();
        $tmp = $this->groups_list;
        $key = array_search(
            $this->modal_group_name,
            array_column($tmp, 'groupName')
        );
        if ($this->groups_list[$key]['groupName'] != $this->modal_group_name) {
            $this->search_error = true;
        } else {
            $this->search_error = false;
            $this->modal_set = false;
            $this->group_name = $this->groups_list[$key]['groupName'];
            Cookie::queue(Cookie::forever('schedule-group-name', $this->group_name));
            $this->get_group_data();
        }
    }

    public function get_group_data()
    {
        $path = env('API_SERVER') . 'groups/certain?name=' . urlencode($this->group_name);
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
//                    if (isset($lesson['weeks'])) {
                    if (is_null($lesson['weeks']) or in_array($this->current_week, $lesson['weeks'])) {
                        array_push($data, ['n' => $key2, 'name' => $lesson['name'], 'tuter' => $lesson['tutor'],
                            'place' => $lesson['place'], 'type' => $lesson['type']]);
//                        echo $d . ' ' . var_dump($lesson) . ' ';
                    }
                }
                if ($key2 == 5 and !isset($p_list['day_name'])) {
                    array_push($this->lessons, ['day_name' => $d, 'data' => $data]);
                    unset($data);

                }

            }
        }
    }

    public function get_groups()
    {
        if (!isset($this->groups_list[1])) {
            $path = env('API_SERVER') . 'groups/all';
            $this->groups_list = json_decode(file_get_contents($path), true);
        }
    }

    public function mount()
    {
//        dd(Cookie::get());
        if (Cookie::has('schedule-group-name')) {
            $this->group_name =  Cookie::get('schedule-group-name');
            $this->modal_group_name =  $this->group_name;
            $this->get_group_data();
        } else {
            $this->modal_set = true;
//            $this->view_groups[0] = $this->groups_list[0];
//            $this->view_groups[1] = $this->groups_list[1];
//            $this->view_groups[2] = $this->groups_list[2];
//            $this->view_groups[3] = $this->groups_list[3];
//            $this->view_groups[4] = $this->groups_list[4];
//            dd($this->group_list);
        }
    }

    public function select($name)
    {
        Cookie::queue(Cookie::forever('schedule-group-name', $name));
    }

    public function render()
    {
        return view('livewire.guest.schedule')->layout('layouts.guest');
    }
}
