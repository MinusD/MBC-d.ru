<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MainController extends Controller
{
    public function DashboardRedirect()
    {
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
}
