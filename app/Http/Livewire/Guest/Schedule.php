<?php

namespace App\Http\Livewire\Guest;

use App\Models\LogLandingGetGroupSchedule;
use App\Models\logLandingSaveGroupSchedule;
use App\Models\PublicGroupSlug;
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
    public $current_day;
    public $g;
    public $show_week;
    public $timetable = [];
    public $tid;

    protected $groups_list = [];

    protected $queryString = [
        'g' => ['except' => ''],
    ];

    public function openSetModal()
    {
        if ($this->modal_set) {
            $this->modal_set = false;
        }
        $this->modal_set = true;
    }

    public function next_week()
    {
        $this->show_week++;
        $this->load_data();
    }

    public function current_week()
    {
        $this->show_week = $this->current_week;
        $this->load_data();
    }

    public function previous_week()
    {
        if ($this->show_week != 1) {
            $this->show_week--;
        } else {
            return;
        }

        $this->load_data();
    }

    public function save()
    {
        $this->modal_group_name = trim($this->modal_group_name);
        if ($this->modal_group_name == $this->group_name) {
            $this->search_error = false;
            $this->modal_set = false;
            return;
        }
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
            unset($this->lessons);
            $this->lessons = [];
            if (Cookie::has('schedule-group-name')) {
                $n = false;
            } else {
                $n = true;
            }
            Cookie::queue(Cookie::forever('schedule-group-name', $this->group_name));
            $this->tid = PublicGroupSlug::where('group_slugs', $this->group_name)->firstOrCreate(['group_slugs' =>$this->group_name], ['id'])->id;
            $this->get_group_data();
            $log = new logLandingSaveGroupSchedule();
            $log->public_group_id = $this->tid;
            $log->is_new = $n;
            $log->is_authorize = \Auth::check();
            $log->save();



        }
    }

    public function get_group_data()
    {

        $this->g =  $this->group_name;
        $path = env('API_SERVER') . 'groups/certain?name=' . urlencode($this->group_name);
        $path2 = env('API_SERVER') . 'time/week';
        $timetable = json_decode(file_get_contents($path), true)[0];
        $this->timetable = $timetable;
        $this->current_week = json_decode(file_get_contents($path2), true);
        $this->show_week = $this->current_week;

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
        $log2 = new LogLandingGetGroupSchedule();
        $log2->public_group_id = $this->tid;
        $log2->save();
    }

    public function load_data()
    {
        $this->lessons = [];
        $timetable = $this->timetable;
        $this->lessons_time = $timetable['lessonsTimes'][0];
        if ($this->show_week % 2 == 1) {
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
                    if (is_null($lesson['weeks']) or in_array($this->show_week, $lesson['weeks'])) {
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

    public function get_groups()
    {
        if (!isset($this->groups_list[1])) {
            header('Content-Type: application/json');
            $path = env('API_SERVER') . 'groups/all';
            $this->groups_list = json_decode(file_get_contents($path), true);
        }
    }

    public function mount()
    {
        $this->current_day = getdate()['wday'] - 1;
        if (!is_null($this->g)) {
            $this->modal_group_name = $this->g;
            $this->save();
            if ($this->search_error) {
                $this->modal_set = true;
            }
            return;
        }

        if (Cookie::has('schedule-group-name')) {
            $this->group_name = Cookie::get('schedule-group-name');
            $this->modal_group_name = $this->group_name;
            $this->tid = PublicGroupSlug::where('group_slugs', $this->group_name)->firstOrCreate(['group_slugs' =>$this->group_name], ['id'])->id;
            $this->get_group_data();
        } else {
            $this->modal_set = true;
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
