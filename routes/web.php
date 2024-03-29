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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/test', function () {
    return view('test');
});

Route::group([
    'prefix' => 'guest',
], function () {
//    Route::get('/dashboard', \App\Http\Livewire\guest\Dashboard::class)->name('guest.dashboard');
});


Route::group([
    'prefix' => 'd', // dashboard
    'middleware' => ['auth:sanctum', 'verified'],
], function () {
    Route::group([
        'prefix' => 's', // student
        'middleware' => ['can:user-panel-access'],
    ], function () {
        Route::get('/', \App\Http\Livewire\Student\Dashboard::class)->name('student.dashboard');
        Route::get('schedule', \App\Http\Livewire\Student\Schedule::class)->name('student.schedule');
        Route::get('homework', \App\Http\Livewire\Student\Homework::class)->name('student.homework');
        Route::get('services', \App\Http\Livewire\Student\Services::class)->name('student.services');


    });
    Route::group([
        'prefix' => 'h', //headman
        'middleware' => ['can:headman-panel-access'],
    ], function () {
        Route::get('/', \App\Http\Livewire\Headman\Dashboard::class)->name('headman.dashboard');
        Route::get('pins', \App\Http\Livewire\Headman\Pins::class)->name('headman.pins');
        Route::get('homework', \App\Http\Livewire\Headman\Homework::class)->name('headman.homework');
        Route::get('services', \App\Http\Livewire\Headman\Services::class)->name('headman.services');
        Route::get('applications', \App\Http\Livewire\Headman\GroupApplications::class)->name('headman.applications');
        Route::get('homeworks-applications', \App\Http\Livewire\Headman\HomeworkApplications::class)->name('headman.homeworks-applications');

    });

    Route::group([
        'prefix' => 'm', // moderator
        'middleware' => ['can:mod-panel-access'],
    ], function () {
        Route::get('/', \App\Http\Livewire\Moderator\Dashboard::class)->name('moderator.dashboard');
//        Route::get('/group/id-{id}', [\App\Http\Controllers\GroupsController::class, 'learnerSeeGroup'])->name('learner-see-group');
    });


    Route::group([
        'prefix' => 'a', // admin
        'middleware' => ['can:admin-panel-access'],
    ], function () {
        Route::get('/', \App\Http\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
        Route::get('stats', \App\Http\Livewire\Admin\Stats::class)->name('admin.stats');
        Route::get('export', \App\Http\Livewire\Admin\Export::class)->name('admin.export');
        Route::get('short-links', \App\Http\Livewire\Admin\ShortLinks::class)->name('admin.short-links');
        Route::get('logs', \App\Http\Livewire\Admin\Logs::class)->name('admin.logs');
        Route::get('groups', \App\Http\Livewire\Admin\Groups::class)->name('admin.groups');

        Route::group([
            'prefix' => 'logs'
        ], function () {
//            Route::get('/openbox', \App\Http\Livewire\Admin\Log\OpenBox::class)->name('admin.log.openbox');

        });
    });
});

Route::get('schedule', \App\Http\Livewire\Guest\Schedule::class)->name('guest.schedule');
Route::get('new-schedule', \App\Http\Livewire\Guest\NewSchedule::class)->name('guest.new-schedule');
Route::get('couples-schedule', \App\Http\Livewire\Guest\CouplesSchedule::class)->name('guest.couples-schedule');


Route::get('/', \App\Http\Livewire\Landing\Home::class)->name('landing.home');
Route::get('about', \App\Http\Livewire\Landing\About::class)->name('landing.about');
Route::get('contacts', \App\Http\Livewire\Landing\Contacts::class)->name('landing.contacts');
Route::get('team', \App\Http\Livewire\Landing\Team::class)->name('landing.team');
Route::get('fs', \App\Http\Livewire\Landing\Fastshare::class)->name('landing.fastshare');
Route::get('register', \App\Http\Livewire\Landing\Registration::class)->name('landing.register');
Route::get('rbi', \App\Http\Livewire\Landing\RegByCode::class)->name('landing.reg_by_code');
Route::get('s', \App\Http\Livewire\Landing\Test::class)->name('landing.test');
Route::get('adm', \App\Http\Livewire\Admin\Helper::class);

Route::group([
    'prefix' => 'services',
], function () {
    Route::get('/', \App\Http\Livewire\Landing\Service::class)->name('landing.services');
    Route::get('teachersinfo', \App\Http\Livewire\Landing\Service\TeachersInfo::class)->name('landing.services.teachers_info');
    Route::get('help/informatics', \App\Http\Livewire\Landing\Service\Help\Informatics::class)->name('landing.services.help.informatics');
    Route::get('help/informatics11', \App\Http\Livewire\Landing\Service\Help\Informatics11::class)->name('landing.services.help.informatics11');
    Route::get('materials/english-texts', \App\Http\Livewire\Landing\Service\Materials\EnglishTexts::class)->name('landing.services.materials.english-texts');
    Route::get('materials/book/{book}', \App\Http\Livewire\Landing\Service\Materials\BookReader::class)->name('landing.services.materials.book');
});


Route::group([
    'prefix' => 'api',
], function () {
    Route::group([
        'prefix' => 'extension',
    ], function () {
        Route::get('/get_group_data', [\App\Http\Controllers\ApiController::class, 'GroupGetData']);
        Route::get('/notify_user', [\App\Http\Controllers\ApiController::class, 'NotifyUser']);
        Route::post('/obtain_data', [\App\Http\Controllers\ApiController::class, 'ObtainData']);

//        Route::get('/obtain_data', [\App\Http\Controllers\ApiController::class, 'ObtainData']);
//        Route::get('/obtain_data/post', [\App\Http\Controllers\ApiController::class, 'ObtainData']);
//        Route::put('/obtain_data/put', [\App\Http\Controllers\ApiController::class, 'ObtainData']);
    });
    Route::group([
        'prefix' => 'shortcuts',
    ], function () {

    });
    //    Route::get('help/informatics', \App\Http\Livewire\Landing\Service\Help\Informatics::class)->name('landing.services.help.informatics');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [\App\Http\Controllers\MainController::class, 'DashboardRedirect'])->name('dashboard');
Route::get('import/{token}', \App\Http\Livewire\Admin\Import::class);

Route::get('r/{key}', [\App\Http\Controllers\MainController::class, 'CustomRedirect']);

Route::fallback([\App\Http\Controllers\MainController::class, 'OldLinkRedirect']);
//Route::get('t', [\App\Http\Controllers\MainController::class, 'test']);
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [\App\Http\Controllers\MainController::class, 'DashboardRedirect'])->name('dashboard');
//Route::get('/', \App\Http\Livewire\Landing\Home::class)->name('landing.home');
