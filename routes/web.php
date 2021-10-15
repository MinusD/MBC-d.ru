<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [\App\Http\Controllers\MainController::class, 'DashboardRedirect'])->name('dashboard');

Route::get('/test', function () {
    return view('test');
});

Route::group([
    'prefix' => 'guest',
], function () {
//    Route::get('/dashboard', \App\Http\Livewire\guest\Dashboard::class)->name('guest.dashboard');
});


Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth:sanctum', 'verified'],
], function () {
    Route::group([
        'prefix' => 'student',
        'middleware' => ['can:user-panel-access'],
    ], function () {
        Route::get('/', \App\Http\Livewire\Student\Dashboard::class)->name('student.dashboard');
        Route::get('schedule', \App\Http\Livewire\Student\Schedule::class)->name('student.schedule');
        Route::get('homework', \App\Http\Livewire\Student\Homework::class)->name('student.homework');


    });
    Route::group([
        'prefix' => 'headman',
        'middleware' => ['can:headman-panel-access'],
    ], function () {
        Route::get('/', \App\Http\Livewire\Headman\Dashboard::class)->name('headman.dashboard');
        Route::get('pins', \App\Http\Livewire\Headman\Pins::class)->name('headman.pins');
        Route::get('homework', \App\Http\Livewire\Headman\Homework::class)->name('headman.homework');
    });

    Route::group([
        'prefix' => 'moderator',
        'middleware' => ['can:mod-panel-access'],
    ], function () {

//        Route::get('/', \App\Http\Livewire\Moderator\Dashboard::class)->name('moderator.dashboard');

//        Route::get('/group/id-{id}', [\App\Http\Controllers\GroupsController::class, 'learnerSeeGroup'])->name('learner-see-group');
    });


    Route::group([
        'prefix' => 'admin',
        'middleware' => ['can:admin-panel-access'],
    ], function () {
        Route::get('/', \App\Http\Livewire\Admin\Dashboard::class)->name('admin.dashboard');

        Route::group([
            'prefix' => 'logs'
        ], function () {
//            Route::get('/openbox', \App\Http\Livewire\Admin\Log\OpenBox::class)->name('admin.log.openbox');

        });
    });
});

Route::get('schedule', \App\Http\Livewire\Guest\Schedule::class)->name('guest.schedule');

Route::get('/', \App\Http\Livewire\Landing\Home::class)->name('landing.home');
Route::get('about', \App\Http\Livewire\Landing\About::class)->name('landing.about');
Route::get('contacts', \App\Http\Livewire\Landing\Contacts::class)->name('landing.contacts');
Route::get('team', \App\Http\Livewire\Landing\Team::class)->name('landing.team');
Route::get('fs', \App\Http\Livewire\Landing\Fastshare::class)->name('landing.fastshare');
Route::get('register', \App\Http\Livewire\Landing\Registration::class)->name('landing.register');
Route::get('register_by_invite', \App\Http\Livewire\Landing\RegByCode::class)->name('landing.reg_by_code');
Route::get('s', \App\Http\Livewire\Landing\Test::class)->name('landing.test');


//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [\App\Http\Controllers\MainController::class, 'DashboardRedirect'])->name('dashboard');
//Route::get('/', \App\Http\Livewire\Landing\Home::class)->name('landing.home');
