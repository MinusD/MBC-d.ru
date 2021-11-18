<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MainController extends Controller
{
    public function DashboardRedirect()
    {
        if (Auth::user()->hasRole('admin')) {
            return redirect(route('admin.dashboard'));
        } elseif (Auth::user()->hasRole('moderator')) {
            return 'moderator';
        } elseif (Auth::user()->hasRole('student')) {
            return redirect(route('student.dashboard'));
        } else {
            return abort(503);
        }
    }

    public function test(): string
    {
//        $path = env('API_SERVER') . 'groups/certain?name=' . urlencode("ИКБО-30-21");
//        return file_get_contents($path);

        return ('[{"groupName":"ИКБО-30-21","groupSuffix":"КИС","remoteFile":"https://webservices.mirea.ru/upload/iblock/92f/yn3bc1gqjh3ueij696rs3feg2i3fxgoo/ИИТ_1 курс_21-22_осень_дист.xlsx","unitName":"Институт информационных технологий","unitCourse":"Бакалавриат/специалитет, 1 курс","lessonsTimes":[["9:00 – 10:30","10:40 – 12:10","12:40 – 14:10","14:20 – 15:50","16:20 – 17:50","18:00 – 19:30"],["9:00 – 10:30","10:40 – 12:10","12:40 – 14:10","14:20 – 15:50","16:20 – 17:50","18:00 – 19:30"],["9:00 – 10:30","10:40 – 12:10","12:40 – 14:10","14:20 – 15:50","16:20 – 17:50","18:00 – 19:30"],["9:00 – 10:30","10:40 – 12:10",
        "12:40 – 14:10","14:20 – 15:50","16:20 – 17:50","18:00 – 19:30"],["9:00 – 10:30","10:40 – 12:10","12:40 – 14:10","14:20 – 15:50","16:20 – 17:50",
        "18:00 – 19:30"],["9:00 – 10:30","10:40 – 12:10","12:40 – 14:10","14:20 – 15:50","16:20 – 17:50","18:00 – 19:30"]],"updatedDate":"2021-11-04T11:01:06.186Z",
        "schedule":[{"day":"понедельник","odd":[[],[],[],[],[],[]],"even":[[],[],[],[],[],[]]},{"day":"вторник","odd":[[],
        [{"weeks":null,"name":"Линейная алгебра и аналитическая геометрия","type":"лк","tutor":"Берков Н.А.","place":"Д",
        "link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Физика","type":"лк","tutor":"Сафронов А.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
        [{"weeks":null,"name":"История (история России, всеобщая история)","type":"лк","tutor":"Назаров А.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
        [{"weeks":[3,5],"name":"Введение в профессиональную деятельность","type":"лк","tutor":"Карусевич Т.Е.","place":"Д","link":"https://online-edu.mirea.ru"},
        {"weeks":[7,9],"name":"Введение в профессиональную деятельность","type":"лк","tutor":"Сорокин А.Б.","place":"Д","link":"https://online-edu.mirea.ru"},
        {"weeks":[11,13],"name":"Введение в профессиональную деятельность","type":"лк","tutor":"Гусев К.В.","place":"Д","link":null},{"weeks":[15,17],
        "name":"Введение в профессиональную деятельность","type":"лк","tutor":"Плотников С.Б.","place":"Д","link":null}],[]],"even":[[],[{"weeks":null,
        "name":"Линейная алгебра и аналитическая геометрия","type":"лк","tutor":"Берков Н.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
        [{"weeks":null,"name":"Физика","type":"лк","tutor":"Сафронов А.А.","place":"Д","link":"https://online-edu.mirea.ru"}],[{"weeks":null,
        "name":"Процедурное программирование","type":"лк","tutor":"Каширская Е.Н.","place":"Д","link":"https://online-edu.mirea.ru"}],[],[]]},
        {"day":"среда","odd":[[{"weeks":null,"name":"Физика","type":"пр","tutor":"Филимонов В.В.","place":"Д","link":"https://online-edu.mirea.ru"}],
        [{"weeks":null,"name":"Иностранный язык (1 п/г)","type":"пр","tutor":"Филипская А.В. ","place":"Д","link":"https://online-edu.mirea.ru"},
        {"weeks":null,"name":"Иностранный язык (2 п/г)","type":"пр","tutor":"Кухтина Я.В.","place":null,"link":"https://online-edu.mirea.ru"},
        {"weeks":null,"name":"Французский язык","type":"пр","tutor":"Ослякова И.В.","place":null,"link":null}],[{"weeks":null,"name":"Физическая культура и спорт",
        "type":"пр","tutor":null,"place":"Д","link":"https://online-edu.mirea.ru"}],[],[],[]],"even":[[{"weeks":null,"name":"Физика","type":"пр","tutor":"Филимонов В.В.",
        "place":"Д","link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Иностранный язык (1 п/г)","type":"пр","tutor":"Филипская А.В. ","place":"Д",
        "link":"https://online-edu.mirea.ru"},{"weeks":null,"name":"Иностранный язык (2 п/г)","type":"пр","tutor":"Кухтина Я.В.","place":null,
        "link":"https://online-edu.mirea.ru"},{"weeks":null,"name":"Французский язык","type":"пр","tutor":"Ослякова И.В.","place":null,"link":null}],
        [{"weeks":null,"name":"Физическая культура и спорт","type":"пр","tutor":null,"place":"Д","link":"https://online-edu.mirea.ru"}],[],[],[]]},
        {"day":"четверг","odd":[[],[],[],[{"weeks":[3,5,7,9,11,13,15],"name":"Информатика","type":"лк","tutor":"Воронов Г.Б.","place":"Д",
        "link":"https://online-edu.mirea.ru"}],[{"weeks":[3,5,7,9,11,13,15],"name":"Математический анализ","type":"лк",
        "tutor":"Шамин Р.В.","place":"Д","link":"https://online-edu.mirea.ru"}],[]],"even":[[],[],
        [{"weeks":[8],"name":"Информатика","type":"лк","tutor":"Воронов Г.Б.","place":"Д","link":"https://online-edu.mirea.ru"}],
        [{"weeks":null,"name":"Информатика","type":"лк","tutor":"Воронов Г.Б.","place":"Д","link":"https://online-edu.mirea.ru"}],
        [{"weeks":null,"name":"Математический анализ","type":"лк","tutor":"Шамин Р.В.","place":"Д","link":"https://online-edu.mirea.ru"}],
        [{"weeks":[6],"name":"Математический анализ","type":"лк","tutor":"Шамин Р.В.","place":"Д","link":"https://online-edu.mirea.ru"}]]},
        {"day":"пятница","odd":[[],[],[],[{"weeks":null,"name":"История (история России, всеобщая история)","type":"пр","tutor":"Назаров А.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
        [{"weeks":null,"name":"Процедурное программирование","type":"пр","tutor":"Серебрянкин В.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
        [{"weeks":null,"name":"Процедурное программирование","type":"пр","tutor":"Серебрянкин В.А.","place":"Д","link":"https://online-edu.mirea.ru"}]],
        "even":[[],[],[{"weeks":[4,8,12,16],"name":"Физика (1 п/г)","type":"лаб","tutor":"Соловьев А.А.","place":"Д","link":"https://online-edu.mirea.ru"},
        {"weeks":[4,8,12,16],"name":"Физика (2 п/г)","type":"лаб","tutor":"Хусяинов Д.И.","place":null,"link":"https://online-edu.mirea.ru"}],
        [{"weeks":[4,8,12,16],"name":"Физика (1 п/г)","type":"лаб","tutor":"Соловьев А.А.","place":"Д","link":"https://online-edu.mirea.ru"},
        {"weeks":[4,8,12,16],"name":"Физика (2 п/г)","type":"лаб","tutor":"Хусяинов Д.И.","place":null,"link":"https://online-edu.mirea.ru"}],
        [{"weeks":null,"name":"Процедурное программирование","type":"пр","tutor":"Серебрянкин В.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
        [{"weeks":null,"name":"Процедурное программирование","type":"пр","tutor":"Серебрянкин В.А.","place":"Д","link":"https://online-edu.mirea.ru"}]]},
        "day":"суббота","odd":[[],[],[{"weeks":null,"name":"Линейная алгебра и аналитическая геометрия","type":"пр","tutor":"Ефанов А.А.","place":"Д",
        "link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Математический анализ","type":"пр","tutor":"Спешилова А.В.","place":"Д",
        "link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Информатика","type":"пр","tutor":"Тябут Е.А.","place":"Д","link":"https://online-edu.mirea.ru"}],
        []],"even":[[],[],[{"weeks":null,"name":"Линейная алгебра и аналитическая геометрия","type":"пр","tutor":"Ефанов А.А.","place":"Д",
        "link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Математический анализ","type":"пр","tutor":"Спешилова А.В.","place":"Д",
        "link":"https://online-edu.mirea.ru"}],[{"weeks":null,"name":"Информатика","type":"пр","tutor":"Тябут Е.А.","place":"Д","link":"https://online-edu.mirea.ru"}],[]]}]}]');
    }
}
