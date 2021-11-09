<?php

namespace App\Http\Livewire\Admin;

use App\Models\FastShare;
use App\Models\Folder;
use App\Models\Group;
use App\Models\GroupInvites;
use App\Models\Homework;
use App\Models\LogLandingGetGroupSchedule;
use App\Models\logLandingSaveGroupSchedule;
use App\Models\LonelyStudentGroup;
use App\Models\Pin;
use App\Models\PublicGroupSlug;
use App\Models\StudentCompletedHomework;
use App\Models\StudentGroupInvite;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;

class Export extends Component
{
//    public $without_id = false;

    public $result = [];
    public $data_result;
    public $stats_result;

    public $import_stats;


    public function import_stats()
    {

    }

    public function export_stats()
    {
        $data['pg'] = PublicGroupSlug::all()->toArray();
        $data['lg'] = LogLandingGetGroupSchedule::all()->toArray();
        $data['ls'] = logLandingSaveGroupSchedule::all()->toArray();
        $this->stats_result = json_encode($data);
    }

    public function export_data()
    {
        $data = [];
        $data['u'] = User::all()->toArray();
        $data['fs'] = FastShare::all()->toArray();
        $data['g'] = Group::all()->toArray();
        $data['f'] = Folder::all()->toArray();
        $data['p'] = Pin::all()->toArray();
        $data['s'] = Subject::all()->toArray();
        $data['h'] = Homework::all()->toArray();
        $data['gi'] = GroupInvites::all()->toArray();
        $data['sg'] = StudentGroupInvite::all()->toArray();
        $data['sc'] = StudentCompletedHomework::all()->toArray();
        $data['ls'] = LonelyStudentGroup::all()->toArray();
        $data['pg'] = PublicGroupSlug::all()->toArray();
        $data['lg'] = LogLandingGetGroupSchedule::all()->toArray();
        $data['ls'] = logLandingSaveGroupSchedule::all()->toArray();
        $this->data_result =  json_encode($data);
    }

    public function generate_export()
    {
        $this->result['date'] = date("Y-m-d H:i:s");
        $data = [];
        $data['data'] = [];
        $data['labels'] = ['id', 'group_id', 'name', 'sname', 'pname', 'email', 'password', 'profile_photo_path', 'created_at'];
        foreach (User::all(['id', 'group_id', 'name', 'sname', 'pname', 'email', 'password', 'profile_photo_path', 'created_at']) as $user) {
            $d2 = [];
            foreach ($user->toArray() as $key => $label) {
                array_push($d2, $label);
            }
            array_push($data['data'], $d2);
        }
        $this->result['data'] = $data;

        dd(($this->result));
    }

    public function render()
    {
        return view('livewire.admin.export')->layout('layouts.admin');
    }
}
