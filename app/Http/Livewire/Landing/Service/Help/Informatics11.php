<?php

namespace App\Http\Livewire\Landing\Service\Help;

use App\Models\PublicGroupSlug;
use Livewire\Component;

class Informatics11 extends Component
{

    public $input = "";
    public $data = [];
    public $data2 = [];
    public $n2 = "";
    public $data3 = [];


    public function gen_arr()
    {
        try {

            $tmp = str_split($this->input);
            $f = !$tmp[0];
            $m = base_convert($tmp[1], 16, 10);
            $s = base_convert($tmp[2], 16, 10);
            $this->data3['f'] = $f ? 'Сложение' : 'Вычитание';
            $this->data3['m'] = $m;
            $this->data3['s'] = $s;
            $d2 = [];
            $this->data2 = [];
            $this->data = [];
            for ($i = 0; $i < 8; $i++) {
                array_push($this->data, []);
                for ($j = 0; $j < 16; $j++) {
                    $d = 0;
                    if ($i == 0) {
                        if ($j > 7) {
                            $d = 1;
                        }
                    } elseif ($i == 1) {
                        if (($j / 4) % 2 == 1) {
                            $d = 1;
                        }
                    } elseif ($i == 2) {
                        if (($j / 2) % 2 == 1) {
                            $d = 1;
                        }
                    } elseif ($i == 3) {
                        if ($j % 2 == 1) {
                            $d = 1;
                        }
                    }
                    array_push($this->data[$i], $d);
                }
            }
            $d2 = array_fill(0, 8, array_fill(0, 2, -1));
            foreach ($this->data as $key => $item) {
                foreach ($item as $key2 => $el) {
                    $d2[$key2][$key] = $this->data[$key][$key2];
                }
            }

            $r = 1;
            if ($f) {
                $s_tmp = $s;
            } else {
                $s_tmp = (int)$m - (int)$s + 1;
            }

            for ($i = 0; $i < 16; $i++) {
                $num_data = array_reverse((str_split(base_convert($s_tmp, 10, 2))));
                $tmp_index = 7;
                if ($i > $m) {
                    $d2[$i][4] = "*";
                    $d2[$i][5] = "*";
                    $d2[$i][6] = "*";
                    $d2[$i][7] = "*";
                } else {
                    foreach ($num_data as $el) {
                        $d2[$i][$tmp_index] = (int)$el;
                        $tmp_index--;
                    }
                }

                if ($s_tmp == $m) {
                    $s_tmp = -$r;
                }
                $s_tmp += $r;
            }

            $this->data2 = $d2;
            $this->resetErrorBag();
        } catch (\Exception $e) {
            $this->addError('input', 'Данные некорректны');
        }
    }

    public function go()
    {
        $this->gen_arr();
    }

    public function render()
    {
        return view('livewire.landing.service.help.informatics11')->layout('layouts.landing');
    }
}
