<?php

namespace Database\Seeders;

use App\Models\Folder;
use App\Models\Group;
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
    }
}
