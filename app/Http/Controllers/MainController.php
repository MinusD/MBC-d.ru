<?php

namespace App\Http\Controllers;

use App\Models\CustomLink;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Storage;

class MainController extends Controller
{
    public function DashboardRedirect()
    {
        if (Auth::user()->hasRole('student')) {
            return redirect(route('student.dashboard'));
        }
        if (Auth::user()->hasRole('admin')) {
            return redirect(route('admin.dashboard'));
        } elseif (Auth::user()->hasRole('moderator')) {
            return 'moderator';
        } elseif (Auth::user()->hasRole('student')) {
            return redirect(route('student.dashboard'));
        } else {
            return abort(503);
        }
    }

    public function CustomRedirect($key)
    {
        $l = CustomLink::where('full', $key)->orWhere('short', $key)->first();
        if (!is_null($l)) {
            $l->counter++;
            $l->save();
            return redirect($l->link);
        } else {
            return "Ключ не найден";
        }
    }

    public function test()
    {
//        $d = User::find(2);
//        Storage::put('attempt1.txt', $d);
    }
}
