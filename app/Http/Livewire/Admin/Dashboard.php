<?php

namespace App\Http\Livewire\Admin;

use App\Models\LogLandingGetGroupSchedule;
use App\Models\PublicGroupSlug;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;

class Dashboard extends Component
{
    public $firstRun = true;
    public $public_group_get_data = [];
    public $colors = [];
//    public $


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

    public function mount()
    {
        $this->colors = [
            '#ED0CD2',
            '#0C21F7',
            '#17E0B4',
            '#85F70C',
            '#F0BA32',

            '#F04142',
            '#836EFA',
            '#16E0B5',
            '#CDF70C',
            '#F09432',

            '#ED0CD2',
            '#0C21F7',
            '#17E0B4',
            '#85F70C',
            '#F0BA32',

            '#F04142',
            '#836EFA',
            '#16E0B5',
            '#CDF70C',
            '#F09432',
        ];


    }

    public function render()
    {
        $data = LogLandingGetGroupSchedule::all('public_group_id');
        $data2 = [];
        foreach ($data as $el) {
            $data3 = array_keys(array_column($data2, 0), $el['public_group_id']);
            if (count($data3) > 0) {
                $data2[$data3[0]][1]++;
            } else {
                array_push($data2, [$el['public_group_id'], 1]);
            }
        }

        $ChartData1 =
            (new pieChartModel())
                ->setTitle('Публичное расписание');
//                ->addSlice("ИКБО-30-21", 4, '#f6ad55')
//                ->addSlice("ИКБО-12-21", 6, '#cbd5e0')
//                ->addSlice("ИКБО-22-21", 1, '#fc8181')


        // Тут отсортировать
        for ($a = 0; $a < count($data2); $a++) {
            for ($b = 0; $b < count($data2) - 1; $b++) {
                if ($data2[$b][1] > $data2[$b + 1][1]) {
                    $temp = $data2[$b + 1];
                    $data2[$b + 1] = $data2[$b];
                    $data2[$b] = $temp;
                }
            }
        }
        $sum = 0;
        foreach ($data2 as $key => $item) {
//            dd($item);
            if ($key < 20) {
                $ChartData1->addSlice(PublicGroupSlug::find($item[0], 'group_slugs')->group_slugs, $item[1], $this->colors[$key]);
            } else {
                $sum += $item[1];
            }
        }
        if ($sum != 0) {
            $ChartData1->addSlice('Другие', $sum, "#666666");
        }
        $ChartData1
//            ->withOnSliceClickEvent('onSliceClick')
            ->setAnimated($this->firstRun);


//                ->addColumn('Food', 100, '#f6ad55')
//                ->addColumn('Shopping', 200, '#fc8181')
//                ->addColumn('Travel', 300, '#90cdf4');

        $this->firstRun = false;
        return view('livewire.admin.dashboard')->layout('layouts.admin')
            ->with([
                'ChartData1' => $ChartData1,
            ]);
    }


//    public function mount() {
//        dd(json_decode(file_get_contents('https://mirea.xyz/api/v1.2/groups/certain?name=%D0%98%D0%9A%D0%91%D0%9E-30-21&suffix=%D0%9A%D0%98%D0%A1')));
//    }

//    public function render()
//    {
//        return view('livewire.admin.dashboard')->layout('layouts.admin');
//    }
}
