<?php

namespace App\Http\Livewire\Guest;

use App\Models\LogLandingGetGroupSchedule;
use App\Models\logLandingSaveGroupSchedule;
use App\Models\PublicGroupSlug;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use WireUi\Traits\Actions;

class CouplesSchedule extends Component
{
    use Actions;

    public $view_groups;

    public $modal_set = false;
    public $group_name = '';
    public $group_name2 = '';
    public $modal_group_name;
    public $modal_group_name2;
    public $search_error = false;
    public $search_error2 = false;
    public $lessons_time;
    public $current_week;
    public $lessons = [];
    public $current_day;
    public $g;
    public $g2;
    public $show_week;
    public $timetable = [];
    public $tid;
    public $api_error = false;
    public $date;
    public $show_date;
    public $previous_group = "";

    protected $groups_list = [];

    protected $queryString = [
        'g' => ['except' => ''],
        'g2' => ['except' => ''],
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
        $this->date = strtotime('+1 week', $this->date);
        $this->show_date = $this->date;
    }

    public function current_week()
    {
        $this->show_week = $this->current_week;
        $this->load_data();
        $this->date = strtotime('monday this week');
        $this->show_date = $this->date;
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

    public function get_previous_group(){
        $tmp = $this->modal_group_name;
        $this->modal_group_name = $this->previous_group;
        $this->previous_group = $tmp;
        $this->save();
    }

    public function save()
    {
        $this->modal_group_name = trim($this->modal_group_name);
        $this->modal_group_name2 = trim($this->modal_group_name2);
        if ($this->modal_group_name == $this->group_name) {
            $this->search_error = false;
            $this->modal_set = false;
            //return;
        }
        $this->get_groups();
        $key = array_search(
            $this->modal_group_name,
            array_column($this->groups_list, 'groupName')
        );
        $key2 = array_search(
            $this->modal_group_name2,
            array_column($this->groups_list, 'groupName')
        );
        try {
            if (!($this->groups_list[$key]['groupName'] == $this->modal_group_name and
                $this->groups_list[$key2]['groupName'] == $this->modal_group_name2)) {
                $this->search_error = true;
            } else {
                $this->search_error = false;
                $this->modal_set = false;
                $this->group_name = $this->groups_list[$key]['groupName'];
                $this->group_name2 = $this->groups_list[$key2]['groupName'];
                unset($this->lessons);
                $this->lessons = [];
                $this->get_group_data();
                $log = new logLandingSaveGroupSchedule();
                $log->public_group_id = $this->tid;
                $log->is_new = $n;
                $log->is_authorize = \Auth::check();
                $log->save();
            }
        } catch (Exception $e) {
            $this->api_error = true;
            $this->modal_set = false;
        }

    }

    public function get_group_data()
    {
        $this->g = $this->group_name;
        $path = env('API_SERVER') . 'groups/certain?name=' . urlencode($this->group_name);
        $path2 = env('API_SERVER') . 'time/week';
        $this->date = strtotime('monday this week');
        $this->show_date = $this->date;
        try {
//            $timetable = json_decode(file_get_contents($path), true)[0];
            $this->timetable = json_decode(file_get_contents($path), true)[0];
            $this->current_week = json_decode(file_get_contents($path2), true);
            $this->show_week = $this->current_week;

            $this->lessons_time = $this->timetable['lessonsTimes'][0];
            if ($this->current_week % 2 == 1) {
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
        } catch (Exception $e) {
            $this->api_error = true;
        }
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
            try {
                $this->groups_list = json_decode(file_get_contents($path), true);
            } catch (Exception $e) {
                $this->api_error = true;
            }

        }
    }

    public function load_with_cookie()
    {
        $this->tid = PublicGroupSlug::where('group_slugs', $this->group_name)->firstOrCreate(['group_slugs' => $this->group_name], ['id'])->id;
        $this->get_group_data();
    }

    public function mount()
    {
        $this->current_day = getdate()['wday'] - 1;
        if (!is_null($this->g)) {
            if (Cookie::has('schedule-group-name')) {
                $this->group_name = Cookie::get('schedule-group-name');
                if ($this->group_name == $this->g) {
                    $this->modal_group_name = $this->g;
                    $this->load_with_cookie();
                    return;
                }
            }
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
            $this->load_with_cookie();
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
        return view('livewire.guest.couples-schedule')->layout('layouts.guest');
    }
}
