<?php

namespace App\Http\Livewire\Admin;

use App\Models\LogLandingGetGroupSchedule;
use App\Models\logLandingSaveGroupSchedule;
use App\Models\PublicGroupSlug;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Carbon\Carbon;
use Livewire\Component;

class Stats extends Component
{
    public $firstRun = true;
    public $public_group_get_data = [];
    public $colors = [];
    public $time = "5";
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

    public function color_luminance($hex, $percent): string
    {
        // validate hex string
        $hex = preg_replace('/[^0-9a-f]/i', '', $hex);
        $new_hex = '#';
        if (strlen($hex) < 6) {
            $hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
        }
        // convert to decimal and change luminosity
        for ($i = 0; $i < 3; $i++) {
            $dec = hexdec(substr($hex, $i * 2, 2));
            $dec = min(max(0, $dec + $dec * $percent), 255);
            $new_hex .= str_pad(dechex($dec), 2, 0, STR_PAD_LEFT);
        }
        return $new_hex;
    }

    public function HSV_TO_RGB($H, $S, $V): array
    {
        $RGB = array();
        if ($S == 0) {
            $R = $G = $B = $V * 255;
        } else {
            $var_H = $H * 6;
            $var_i = floor($var_H);
            $var_1 = $V * (1 - $S);
            $var_2 = $V * (1 - $S * ($var_H - $var_i));
            $var_3 = $V * (1 - $S * (1 - ($var_H - $var_i)));
            if ($var_i == 0) {
                $var_R = $V;
                $var_G = $var_3;
                $var_B = $var_1;
            } else if ($var_i == 1) {
                $var_R = $var_2;
                $var_G = $V;
                $var_B = $var_1;
            } else if ($var_i == 2) {
                $var_R = $var_1;
                $var_G = $V;
                $var_B = $var_3;
            } else if ($var_i == 3) {
                $var_R = $var_1;
                $var_G = $var_2;
                $var_B = $V;
            } else if ($var_i == 4) {
                $var_R = $var_3;
                $var_G = $var_1;
                $var_B = $V;
            } else {
                $var_R = $V;
                $var_G = $var_1;
                $var_B = $var_2;
            }
            $R = $var_R * 255;
            $G = $var_G * 255;
            $B = $var_B * 255;
        }
        $RGB['R'] = $R;
        $RGB['G'] = $G;
        $RGB['B'] = $B;
        return $RGB;
    }

    public function generate_hex()
    {
        $S = 0.9;
        for ($i = 0; $i < 100; $i++) {
            $hash = md5(mt_rand());
            $H = hexdec(substr($hash, 0, 2)) / 255;
            $V = (hexdec(substr($hash, 2, 2)) / 255) / 2 + 0.5; // pick from the brighter half
            $rgb = implode('', array_map(
                function ($a) {
                    return str_pad(dechex(intval($a)), 2, '0', STR_PAD_LEFT);
                }, $this->HSV_TO_RGB($H, $S, $V)));
            array_push($this->colors, "#" . $rgb);
//            return $this->hslToHex(sprintf("HSV(%0.2f,%0.2f,%0.2f)", $H, $S, $V));
//            printf($fmt, $rgb, sprintf("HSV(%0.2f,%0.2f,%0.2f)", $H, $S, $V), $fill);
        }
    }

    public function mount()
    {
//        $this->generate_hex();
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

            '#66ff00',
            '#8400ff',
            '#22ff00',
            '#d900ff',
            '#0044ff',

            '#ff0004',
            '#0037ff',
            '#0066ff',
            '#ff0048',
            '#ff007b',

//            '#ED0CD2',
//            '#0C21F7',
//            '#17E0B4',
//            '#85F70C',
//            '#F0BA32',
//
//            '#F04142',
//            '#836EFA',
//            '#16E0B5',
//            '#CDF70C',
//            '#F09432',
        ];
    }

    public function getChartData($data): PieChartModel
    {
        shuffle($this->colors);
        $data2 = [];
        foreach ($data as $el) {
            $data3 = array_keys(array_column($data2, 0), $el['public_group_id']);
            if (count($data3) > 0) {
                $data2[$data3[0]][1]++;
            } else {
                array_push($data2, [$el['public_group_id'], 1]);
            }
        }
        $ChartData1 = (new pieChartModel());
        for ($a = 0; $a < count($data2); $a++) {
            for ($b = 0; $b < count($data2) - 1; $b++) {
                if ($data2[$b][1] > $data2[$b + 1][1]) {
                    $temp = $data2[$b + 1];
                    $data2[$b + 1] = $data2[$b];
                    $data2[$b] = $temp;
                }
            }
        }
        $data2 = array_reverse($data2);
        $sum = 0;
        foreach ($data2 as $key => $item) {
            if ($key < 11) {
                $ChartData1->addSlice(PublicGroupSlug::find($item[0], 'group_slugs')->group_slugs, $item[1], $this->colors[$key]);
            } else {
                $sum += $item[1];
            }
        }
        if ($sum != 0) {
            $ChartData1->addSlice('Другие', $sum, "#666666");
        }
        $ChartData1
            ->withOnSliceClickEvent('onSliceClick')
            ->setAnimated($this->firstRun);
        return $ChartData1;
    }

    public function render()
    {
        if ($this->time == "5") {
            $ChartData1 = $this->getChartData(LogLandingGetGroupSchedule::all('public_group_id'));
            $ChartData2 = $this->getChartData(logLandingSaveGroupSchedule::all('public_group_id'));
            $ChartData3 = $this->getChartData(logLandingSaveGroupSchedule::where('is_new', true)->get('public_group_id'));
            $ChartData4 = $this->getChartData(logLandingSaveGroupSchedule::where('is_authorize', true)->get('public_group_id'));
            $ChartData5 = $this->getChartData(logLandingSaveGroupSchedule::where('is_new', false)->get('public_group_id'));
            $ChartData6 = $this->getChartData(logLandingSaveGroupSchedule::where('is_authorize', false)->get('public_group_id'));
        } elseif ($this->time == "4") {
            $ChartData1 = $this->getChartData(LogLandingGetGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->get('public_group_id'));
            $ChartData2 = $this->getChartData(logLandingSaveGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->get('public_group_id'));
            $ChartData3 = $this->getChartData(logLandingSaveGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->where('is_new', true)->get('public_group_id'));
            $ChartData4 = $this->getChartData(logLandingSaveGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->where('is_authorize', true)->get('public_group_id'));
            $ChartData5 = $this->getChartData(logLandingSaveGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->where('is_new', false)->get('public_group_id'));
            $ChartData6 = $this->getChartData(logLandingSaveGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->where('is_authorize', false)->get('public_group_id'));
        } elseif ($this->time == "1") {
            $ChartData1 = $this->getChartData(LogLandingGetGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->get('public_group_id'));
            $ChartData2 = $this->getChartData(logLandingSaveGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->get('public_group_id'));
            $ChartData3 = $this->getChartData(logLandingSaveGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->where('is_new', true)->get('public_group_id'));
            $ChartData4 = $this->getChartData(logLandingSaveGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->where('is_authorize', true)->get('public_group_id'));
            $ChartData5 = $this->getChartData(logLandingSaveGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->where('is_new', false)->get('public_group_id'));
            $ChartData6 = $this->getChartData(logLandingSaveGroupSchedule::whereMonth('created_at', '<', Carbon::now()->subMonth()->month)->where('is_authorize', false)->get('public_group_id'));
        } else {
            $ChartData1 = $this->getChartData(LogLandingGetGroupSchedule::all('public_group_id'));
            $ChartData2 = $this->getChartData(logLandingSaveGroupSchedule::all('public_group_id'));
            $ChartData3 = $this->getChartData(logLandingSaveGroupSchedule::where('is_new', true)->get('public_group_id'));
            $ChartData4 = $this->getChartData(logLandingSaveGroupSchedule::where('is_authorize', true)->get('public_group_id'));
            $ChartData5 = $this->getChartData(logLandingSaveGroupSchedule::where('is_new', false)->get('public_group_id'));
            $ChartData6 = $this->getChartData(logLandingSaveGroupSchedule::where('is_authorize', false)->get('public_group_id'));

        }
        $this->firstRun = false;
        $ChartData1->setTitle('Публичное расписание (Get)');
        $ChartData2->setTitle('Публичное расписание (Save)');
        $ChartData3->setTitle('Публичное расписание (New)');
        $ChartData4->setTitle('Публичное расписание (Auth)');
        $ChartData5->setTitle('Публичное расписание (Not New)');
        $ChartData6->setTitle('Публичное расписание (Not Auth)');

        return view('livewire.admin.stats')->layout('layouts.admin')->with([
            'ChartData1' => $ChartData1,
            'ChartData2' => $ChartData2,
            'ChartData3' => $ChartData3,
            'ChartData4' => $ChartData4,
            'ChartData5' => $ChartData5,
            'ChartData6' => $ChartData6,
        ]);
    }
}
