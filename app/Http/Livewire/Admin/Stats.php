<?php

namespace App\Http\Livewire\Admin;

use App\Models\LogLandingGetGroupSchedule;
use App\Models\logLandingSaveGroupSchedule;
use App\Models\PublicGroupSlug;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;

class Stats extends Component
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

//    public function hue2rgb($p, $q, $t)
//    {
//        if ($t < 0) $t += 1;
//        if ($t > 1) $t -= 1;
//        if ($t < 1 / 6) return $p + ($q - $p) * 6 * $t;
//        if ($t < 1 / 2) return $q;
//        if ($t < 2 / 3) return $p + ($q - $p) * (2 / 3 - $t) * 6;
//        return $p;
//    }
//
//    public function rgb2hex($rgb): string
//    {
//        return str_pad(dechex($rgb * 255), 2, '0', STR_PAD_LEFT);
//    }
//
//    public function hslToHex($hsl): string
//    {
//        list($h, $s, $l) = $hsl;
//
//        if ($s == 0) {
//            $r = $g = $b = 1;
//        } else {
//            $q = $l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s;
//            $p = 2 * $l - $q;
//
//            $r = $this->hue2rgb($p, $q, $h + 1 / 3);
//            $g = $this->hue2rgb($p, $q, $h);
//            $b = $this->hue2rgb($p, $q, $h - 1 / 3);
//        }
//
//        return $this->rgb2hex($r) . $this->rgb2hex($g) . $this->rgb2hex($b);
//    }

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
        $ChartData1 = $this->getChartData(LogLandingGetGroupSchedule::all('public_group_id'));
        $ChartData1->setTitle('Публичное расписание (Get)');
        $ChartData2 = $this->getChartData(logLandingSaveGroupSchedule::all('public_group_id'));
        $ChartData2->setTitle('Публичное расписание (Save)');
        $ChartData3 = $this->getChartData(logLandingSaveGroupSchedule::where('is_new', true)->get('public_group_id'));
        $ChartData3->setTitle('Публичное расписание (New)');
        $ChartData4 = $this->getChartData(logLandingSaveGroupSchedule::where('is_authorize', true)->get('public_group_id'));
        $ChartData4->setTitle('Публичное расписание (Auth)');
        $ChartData5 = $this->getChartData(logLandingSaveGroupSchedule::where('is_new', false)->get('public_group_id'));
        $ChartData5->setTitle('Публичное расписание (Not New)');
        $ChartData6 = $this->getChartData(logLandingSaveGroupSchedule::where('is_authorize', false)->get('public_group_id'));
        $ChartData6->setTitle('Публичное расписание (Not Auth)');

        $this->firstRun = false;

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
