<?php

namespace Database\Seeders;

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

        $group = new Group();
        $group->headman_id = $user->id;
        $group->group_name = 'ИКБО-30-21';
        $group->fs_code = '013021';
        $group->fs_pass = '1663';
        $group->save();


    }
}
