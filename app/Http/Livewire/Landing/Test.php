<?php

namespace App\Http\Livewire\Landing;

use App\Models\Group;
use Auth;
use Livewire\Component;
use App\Models\LogLandingGetGroupSchedule;
use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;


class Test extends Component
{
    public $types = ['food', 'shopping', 'entertainment', 'travel', 'other'];
    public $colors = [
        'food' => '#f6ad55',
        'shopping' => '#fc8181',
        'entertainment' => '#90cdf4',
        'travel' => '#66DA26',
        'other' => '#cbd5e0',
    ];
    public $firstRun = true;
    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];
    public function handleOnPointClick($point)
    {
        dd($point);
    }
    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }
    public function handleOnColumnClick($column)
    {
        dd($column);
    }
    public function render()
    {
        $data = LogLandingGetGroupSchedule::all();
        $ChartData1 =
            (new pieChartModel())
                ->setTitle('Expenses by Type')
                ->addSlice("ИКБО-30-21", 4, '#f6ad55')
                ->addSlice("ИКБО-12-21", 6, '#cbd5e0')
                ->addSlice("ИКБО-22-21", 1, '#fc8181')
                ->withOnSliceClickEvent('onSliceClick')
                ->setAnimated($this->firstRun);

//                ->addColumn('Food', 100, '#f6ad55')
//                ->addColumn('Shopping', 200, '#fc8181')
//                ->addColumn('Travel', 300, '#90cdf4');

        $this->firstRun = false;
        return view('livewire.landing.test')->layout('layouts.landing')
            ->with([
                'ChartData1' => $ChartData1,
            ]);
    }


//    public $fs_code;
//
//
//    public function add()
//    {
//        $group = Group::find(1);
//        $group->users()->attach(Auth::id());
////        Auth::user()->group()->atta
//    }
//
//    public function go()
//    {
//        if ($this->fs_code == 16479) {
//            $data = ['fs_code' => $this->fs_code, 'association' => ['y_disk' => 'https://disk.yandex.ru/d/U6qKYq25NOBm8w'],
//                'data_type' => 'faker', 'message' => 'dev-page', 'version' => NULL,
//                'custom_message' => "На странице представлены данные, сугубо для тестирование, реальная структура данных не совпадает с текущей, не используйте данный ответ в качества шаблонного!"];
//            dd($data);
//        } elseif ($this->fs_code == 164790){
//            return $this->redirect('https://disk.yandex.ru/d/U6qKYq25NOBm8w');
//        }
//    }
//
//    public function render()
//    {
//        return view('livewire.landing.test')->layout('layouts.landing');
//    }
}
