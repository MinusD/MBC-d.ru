<?php

namespace Database\Seeders;

use App\Http\Livewire\Headman\Homework;
use App\Models\Folder;
use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Дмитрий';
        $user->sname = 'Луковников';
        $user->pname = 'Романович';
        $user->email = 'a@a.a';
        $user->password = Hash::make(12345678);
        $user->assignRole('student');
        $user->assignRole('headman');
        $user->assignRole('moderator');
        $user->assignRole('admin');
        $user->save();

        $user1 = new User();
        $user1->name = 'Кудлинков';
        $user1->sname = 'Николай';
        $user1->pname = 'Александрович';
        $user1->email = 'v@v.v';
        $user1->password = Hash::make(12345678);
        $user1->assignRole('student');
//        $user1->assignRole('headman');
//        $user1->assignRole('moderator');
//        $user1->assignRole('admin');
        $user1->save();

        $group = new Group();
        $group->headman_id = $user->id;
        $group->group_name = 'ИКБО-30-21';
        $group->fs_code = '013021';
        $group->fs_pass = '16631';
        $group->save();

        $folder = new Folder();
        $folder->name = "Информатика";
        $folder->desc = "Методичка, задания и тд";
        $folder->type = "group";
        $folder->parent_id = $group->id;
        $folder->save();

        $user->group_id = $group->id;
        $user->save();
        $user1->group_id = $group->id;
        $user1->save();

        $path = env('API_SERVER') . 'groups/certain?name=' . urlencode(Group::find($group->id, 'group_name')->group_name);
        $timetable = json_decode(file_get_contents($path), true)[0]['schedule'];
        foreach ($timetable as $day) {
            foreach ($day['odd'] as $para) {
                foreach ($para as $item) {
                    Subject::where('group_id', $group->id)->where('title', $item['name'])->firstOrCreate(['group_id' => $group->id, 'title' => $item['name']]);
                }
            }
            foreach ($day['even'] as $para) {
                foreach ($para as $item) {
                    Subject::where('group_id', $group->id)->where('title', $item['name'])->firstOrCreate(['group_id' => $group->id, 'title' => $item['name']]);
                }
            }
        }

        $homework = new \App\Models\Homework();
        $homework->group_id = $group->id;
        $homework->subject_id = 1;
        $homework->text = "Тут наше любимое домашнее задание, которое каждый должен сделать иначе ему жопа, надеюсь это всем понятно, я по 100 раз не буду вам повторять поняли меня ублюдки мать вашу, щеглы с которым я буду учиться 4 года";
        $homework->to_date = '2021-11-08 00:00:00';
        $homework->save();
    }
}
