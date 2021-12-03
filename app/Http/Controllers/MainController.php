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

    public function CustomRedirect($key)
    {
        switch ($key) {
            case "lektsii-po-informatike":
            case "yZ3I1Sv9":
                return redirect("https://www.youtube.com/playlist?list=PLHROBPvji2_kvAH8Nshvk0u9jQI501prv");
                break;
            default:
                return "Ключ не найден";
        }
    }

    public function test(): string
    {
        return "123";
    }
}
