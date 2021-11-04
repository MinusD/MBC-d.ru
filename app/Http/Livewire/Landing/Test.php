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
        $path = env('API_SERVER') . 'groups/certain?name=' . urlencode("ИКБО-30-21");

//        $data = ('[{"groupName":"ИКБО-30-21","groupSuffix":"КИС","remoteFile":"https://webservices.mirea.ru/upload/iblock/92f/yn3bc1gqjh3ueij696rs3feg2i3fxgoo/ИИТ_1 курс_21-22_осень_дист.xlsx","unitName":"Институт информационных технологий","unitCourse":"Бакалавриат/специалитет, 1 курс","lessonsTimes":[["9:00 – 10:30","10:40 – 12:10","12:40 – 14:10","14:20 – 15:50","16:20 – 17:50","18:00 – 19:30"],["9:00 – 10:30","10:40 – 12:10","12:40 – 14:10","14:20 – 15:50","16:20 – 17:50","18:00 – 19:30"],["9:00 – 10:30","10:40 – 12:10","12:40 – 14:10","14:20 – 15:50","16:20 – 17:50","18:00 – 19:30"],["9:00 – 10:30","10:40 – 12:10",
//        "12:40 – 14:10","14:20 – 15:50","16:20 – 17:50","18:00 – 19:30"],["9:00 – 10:30","10:40 – 12:10","12:40 – 14:10","14:20 – 15:50","16:20 – 17:50",
//        "18:00 – 19:30"],["9:00 – 10:30","10:40 – 12:10","12:40 – 14:10","14:20 – 15:50","16:20 – 17:50","18:00 – 19:30"]],"updatedDate":"2021-11-04T11:01:06.186Z",
//        "schedule":[{"day":"понедельник","odd":[[],[],[],[],[],[]],"even":[[],[],[],[],[],[]]},{"day":"вторник","odd":[[],
//        [{"weeks":null,"name":"Линейная алгебра и аналитическая геометрия","type":"лк","tutor":"Берков Н.А.","place":"Д",
//        "link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Физика","type":"лк","tutor":"Сафронов А.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
//        [{"weeks":null,"name":"История (история России, всеобщая история)","type":"лк","tutor":"Назаров А.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
//        [{"weeks":[3,5],"name":"Введение в профессиональную деятельность","type":"лк","tutor":"Карусевич Т.Е.","place":"Д","link":"https://online-edu.mirea.ru"},
//        {"weeks":[7,9],"name":"Введение в профессиональную деятельность","type":"лк","tutor":"Сорокин А.Б.","place":"Д","link":"https://online-edu.mirea.ru"},
//        {"weeks":[11,13],"name":"Введение в профессиональную деятельность","type":"лк","tutor":"Гусев К.В.","place":"Д","link":null},{"weeks":[15,17],
//        "name":"Введение в профессиональную деятельность","type":"лк","tutor":"Плотников С.Б.","place":"Д","link":null}],[]],"even":[[],[{"weeks":null,
//        "name":"Линейная алгебра и аналитическая геометрия","type":"лк","tutor":"Берков Н.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
//        [{"weeks":null,"name":"Физика","type":"лк","tutor":"Сафронов А.А.","place":"Д","link":"https://online-edu.mirea.ru"}],[{"weeks":null,
//        "name":"Процедурное программирование","type":"лк","tutor":"Каширская Е.Н.","place":"Д","link":"https://online-edu.mirea.ru"}],[],[]]},
//        {"day":"среда","odd":[[{"weeks":null,"name":"Физика","type":"пр","tutor":"Филимонов В.В.","place":"Д","link":"https://online-edu.mirea.ru"}],
//        [{"weeks":null,"name":"Иностранный язык (1 п/г)","type":"пр","tutor":"Филипская А.В. ","place":"Д","link":"https://online-edu.mirea.ru"},
//        {"weeks":null,"name":"Иностранный язык (2 п/г)","type":"пр","tutor":"Кухтина Я.В.","place":null,"link":"https://online-edu.mirea.ru"},
//        {"weeks":null,"name":"Французский язык","type":"пр","tutor":"Ослякова И.В.","place":null,"link":null}],[{"weeks":null,"name":"Физическая культура и спорт",
//        "type":"пр","tutor":null,"place":"Д","link":"https://online-edu.mirea.ru"}],[],[],[]],"even":[[{"weeks":null,"name":"Физика","type":"пр","tutor":"Филимонов В.В.",
//        "place":"Д","link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Иностранный язык (1 п/г)","type":"пр","tutor":"Филипская А.В. ","place":"Д",
//        "link":"https://online-edu.mirea.ru"},{"weeks":null,"name":"Иностранный язык (2 п/г)","type":"пр","tutor":"Кухтина Я.В.","place":null,
//        "link":"https://online-edu.mirea.ru"},{"weeks":null,"name":"Французский язык","type":"пр","tutor":"Ослякова И.В.","place":null,"link":null}],
//        [{"weeks":null,"name":"Физическая культура и спорт","type":"пр","tutor":null,"place":"Д","link":"https://online-edu.mirea.ru"}],[],[],[]]},
//        {"day":"четверг","odd":[[],[],[],[{"weeks":[3,5,7,9,11,13,15],"name":"Информатика","type":"лк","tutor":"Воронов Г.Б.","place":"Д",
//        "link":"https://online-edu.mirea.ru"}],[{"weeks":[3,5,7,9,11,13,15],"name":"Математический анализ","type":"лк",
//        "tutor":"Шамин Р.В.","place":"Д","link":"https://online-edu.mirea.ru"}],[]],"even":[[],[],
//        [{"weeks":[8],"name":"Информатика","type":"лк","tutor":"Воронов Г.Б.","place":"Д","link":"https://online-edu.mirea.ru"}],
//        [{"weeks":null,"name":"Информатика","type":"лк","tutor":"Воронов Г.Б.","place":"Д","link":"https://online-edu.mirea.ru"}],
//        [{"weeks":null,"name":"Математический анализ","type":"лк","tutor":"Шамин Р.В.","place":"Д","link":"https://online-edu.mirea.ru"}],
//        [{"weeks":[6],"name":"Математический анализ","type":"лк","tutor":"Шамин Р.В.","place":"Д","link":"https://online-edu.mirea.ru"}]]},
//        {"day":"пятница","odd":[[],[],[],[{"weeks":null,"name":"История (история России, всеобщая история)","type":"пр","tutor":"Назаров А.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
//        [{"weeks":null,"name":"Процедурное программирование","type":"пр","tutor":"Серебрянкин В.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
//        [{"weeks":null,"name":"Процедурное программирование","type":"пр","tutor":"Серебрянкин В.А.","place":"Д","link":"https://online-edu.mirea.ru"}]],
//        "even":[[],[],[{"weeks":[4,8,12,16],"name":"Физика (1 п/г)","type":"лаб","tutor":"Соловьев А.А.","place":"Д","link":"https://online-edu.mirea.ru"},
//        {"weeks":[4,8,12,16],"name":"Физика (2 п/г)","type":"лаб","tutor":"Хусяинов Д.И.","place":null,"link":"https://online-edu.mirea.ru"}],
//        [{"weeks":[4,8,12,16],"name":"Физика (1 п/г)","type":"лаб","tutor":"Соловьев А.А.","place":"Д","link":"https://online-edu.mirea.ru"},
//        {"weeks":[4,8,12,16],"name":"Физика (2 п/г)","type":"лаб","tutor":"Хусяинов Д.И.","place":null,"link":"https://online-edu.mirea.ru"}],
//        [{"weeks":null,"name":"Процедурное программирование","type":"пр","tutor":"Серебрянкин В.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
//        [{"weeks":null,"name":"Процедурное программирование","type":"пр","tutor":"Серебрянкин В.А.","place":"Д","link":"https://online-edu.mirea.ru"}]]},
//        "day":"суббота","odd":[[],[],[{"weeks":null,"name":"Линейная алгебра и аналитическая геометрия","type":"пр","tutor":"Ефанов А.А.","place":"Д",
//        "link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Математический анализ","type":"пр","tutor":"Спешилова А.В.","place":"Д",
//        "link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Информатика","type":"пр","tutor":"Тябут Е.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
//        []],"even":[[],[],[{"weeks":null,"name":"Линейная алгебра и аналитическая геометрия","type":"пр","tutor":"Ефанов А.А.","place":"Д",
//        "link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Математический анализ","type":"пр","tutor":"Спешилова А.В.","place":"Д",
//        "link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Информатика","type":"пр","tutor":"Тябут Е.А.","place":"Д","link":"https://online-edu.mirea.ru"}],[]]}]}]');
//        echo(strlen($data));
//        echo $data;
//        $path = "http://127.0.0.1:8000/t";


        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "Accept-language: en\r\n" .
                    "Accept-Encoding: false"
            ]
        ];
        $context = stream_context_create($opts);
        $data = file_get_contents($path, false, $context);

        echo(mb_strlen($data));
        echo '<br>';
        $data2 = mb_substr($data, 20);
        echo(mb_strlen($data2));
        dd($data2);


//        $data = json_decode(file_get_contents($path), true);

//        $path2 = env('API_SERVER') . 'time/week';
//        ini_set("odbc.defaultlrl", "10000");
//        $data = file_get_contents($path);
//        echo $data;
//        dd(($data));
//        $timetable = json_decode(file_get_contents($path), true)[0];

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
