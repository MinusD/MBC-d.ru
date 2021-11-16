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
        Route::get('services', \App\Http\Livewire\Student\Services::class)->name('student.services');


    });
    Route::group([
        'prefix' => 'headman',
        'middleware' => ['can:headman-panel-access'],
    ], function () {
        Route::get('/', \App\Http\Livewire\Headman\Dashboard::class)->name('headman.dashboard');
        Route::get('pins', \App\Http\Livewire\Headman\Pins::class)->name('headman.pins');
        Route::get('homework', \App\Http\Livewire\Headman\Homework::class)->name('headman.homework');
        Route::get('services', \App\Http\Livewire\Headman\Services::class)->name('headman.services');
        Route::get('applications', \App\Http\Livewire\Headman\GroupApplications::class)->name('headman.applications');

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
        Route::get('stats', \App\Http\Livewire\Admin\Stats::class)->name('admin.stats');
        Route::get('export', \App\Http\Livewire\Admin\Export::class)->name('admin.export');

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
Route::get('rbi', \App\Http\Livewire\Landing\RegByCode::class)->name('landing.reg_by_code');
Route::get('s', \App\Http\Livewire\Landing\Test::class)->name('landing.test');

Route::group([
    'prefix' => 'services',
], function () {
    Route::get('/', \App\Http\Livewire\Landing\Service::class)->name('landing.services');
    Route::get('teachersinfo', \App\Http\Livewire\Landing\Service\TeachersInfo::class)->name('landing.services.teachers_info');
    Route::get('help/informatics', \App\Http\Livewire\Landing\Service\Help\Informatics::class)->name('landing.services.help.informatics');
});


Route::group([
    'prefix' => 'api',
], function () {
    Route::group([
        'prefix' => 'extension',
    ], function () {
        Route::get('/get_group_data', [\App\Http\Controllers\ApiController::class, 'GroupGetData']);
        Route::get('/obtain_data', [\App\Http\Controllers\ApiController::class, 'ObtainData']);
        Route::post('/obtain_data/post', [\App\Http\Controllers\ApiController::class, 'ObtainData']);
        Route::get('/notify_user', [\App\Http\Controllers\ApiController::class, 'NotifyUser']);
    });

//    Route::get('help/informatics', \App\Http\Livewire\Landing\Service\Help\Informatics::class)->name('landing.services.help.informatics');

});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [\App\Http\Controllers\MainController::class, 'DashboardRedirect'])->name('dashboard');
Route::get('import/{token}', \App\Http\Livewire\Admin\Import::class);

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [\App\Http\Controllers\MainController::class, 'DashboardRedirect'])->name('dashboard');
//Route::get('/', \App\Http\Livewire\Landing\Home::class)->name('landing.home');
