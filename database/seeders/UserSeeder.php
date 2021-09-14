<?php

namespace Database\Seeders;

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
        $user->name = 'MinusD';
        $user->email = 'a@a.a';
        $user->password = Hash::make(12345678);
        $user->assignRole('admin');
        $user->save();
    }
}
