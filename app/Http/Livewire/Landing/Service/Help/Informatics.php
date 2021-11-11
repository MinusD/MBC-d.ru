<?php

namespace App\Http\Livewire\Landing\Service\Help;

use Livewire\Component;

class Informatics extends Component
{
    public $input1 = "";
    public $input2 = "";
    public $input3 = "";
    public $input4 = "";
    public $data = [];
    public $data2 = [];
    public $colors = [];


    public function gen_arr()
    {
        $d2 = [];
        $this->data2 = [];
        $this->data = [];
        $two1 = str_split(base_convert(('1' . $this->input1), 16, 2));
        $two2 = str_split(base_convert(('1' . $this->input2), 16, 2));
        $two3 = str_split(base_convert(('1' . $this->input3), 16, 2));
        $two4 = str_split(base_convert(('1' . $this->input4), 16, 2));
        for ($i = 0; $i < 10; $i++) {
            array_push($this->data, []);
            for ($j = 0; $j < 16; $j++) {
                $d = 0;
                if ($i == 0) {
                    $d = $j;
                } elseif ($i == 1) {
                    if ($j > 7) {
                        $d = 1;
                    }
                } elseif ($i == 2) {
                    if (($j / 4) % 2 == 1) {
                        $d = 1;
                    }
                } elseif ($i == 3) {
                    if (($j / 2) % 2 == 1) {
                        $d = 1;
                    }
                } elseif ($i == 4) {
                    if ($j % 2 == 1) {
                        $d = 1;
                    }
                } elseif ($i == 5) {
                    $d = $two1[$j + 1];
                } elseif ($i == 6) {
                    $d = $two2[$j + 1];
                } elseif ($i == 7) {
                    $d = $two3[$j + 1];
                } elseif ($i == 8) {
                    $d = $two4[$j + 1];
                }
                array_push($this->data[$i], $d);
            }
        }
//        dd($this->data);


        $d2 = array_fill(0, 10, array_fill(0, 5, -1));
        foreach ($this->data as $key => $item) {
            foreach ($item as $key2 => $el) {
                $d2[$key2][$key] = $this->data[$key][$key2];
            }
        }
        for ($i = 0; $i < 16; $i++) {
            for ($j = 0; $j < 16; $j++) {
                if ($d2[$j][1] == $d2[$i][5] and
                    $d2[$j][2] == $d2[$i][6] and
                    $d2[$j][3] == $d2[$i][7] and
                    $d2[$j][4] == $d2[$i][8]) {
                    $d2[$i][9] = $j;
                    break;
                }
            }
        }
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

        ];
        shuffle($this->colors);
        for ($i = 0; $i < 16; $i++) {
            $flag = true;
            for ($j = 0; $j < 16; $j++) {
                if ($d2[$j][5] == $d2[$i][5] and
                    $d2[$j][6] == $d2[$i][6] and
                    $d2[$j][7] == $d2[$i][7] and
                    $d2[$j][8] == $d2[$i][8] and $i != $j) {
                    $flag = false;
                    $this->colors[$j] = $this->colors[$i];
                }
            }
            if ($flag) {
                $this->colors[$i] = '';
            }
        }
        $this->data2 = $d2;
    }

    public function go()
    {
        $this->gen_arr();
    }


    public function render()
    {
        return view('livewire.landing.service.help.informatics')->layout('layouts.landing');
    }
}
