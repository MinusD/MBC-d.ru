<?php

namespace App\Http\Livewire\Headman;

use App\Models\GroupInvites;
use App\Models\StudentGroupInvite;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class GroupApplications extends Component
{
    use Actions;

    public $applications_wait = [];
    public $applications_not_wait = [];
    public $applications = [];

    public function mount()
    {
        $this->applications = [];
        $this->applications_wait = StudentGroupInvite::where('group_id', \Auth::user()->group_id)->where('status', 'wait')->get();
        $this->applications_not_wait = StudentGroupInvite::where('group_id', \Auth::user()->group_id)->where('status', '!=', 'wait')->get();
        foreach ($this->applications_wait as $app) {
            $u = User::find($app->user_id, ['sname', 'name', 'pname'])->toArray();
            $u['id'] = $app->user_id;
            $u['inv_id'] = $app->id;
            $u['status'] = 'wait';
            $u['created_at'] = $app->created_at;
            $u['updated_at'] = $app->updated_at;
            array_push($this->applications, $u);
        }
        foreach ($this->applications_not_wait as $app) {
            $u = User::find($app->user_id, ['sname', 'name', 'pname'])->toArray();
            $u['id'] = $app->user_id;
            $u['inv_id'] = $app->id;
            $u['status'] = $app->status;
            $u['created_at'] = $app->created_at;
            $u['updated_at'] = $app->updated_at;
            array_push($this->applications, $u);
        }
    }

    public function refused($id)
    {
        $inv = StudentGroupInvite::find($id);
        $inv->status = 'refused';
        $inv->save();
        $this->mount();
//        $user = User::find();
    }

    public function accept($id)
    {
        $inv = StudentGroupInvite::find($id);
        $inv->status = 'accepted';
        $inv->save();
        $user = User::find($inv->user_id);
        $user->group_id = $inv->group_id;
        $user->save();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.headman.group-applications')->layout('layouts.headman');
    }
}
