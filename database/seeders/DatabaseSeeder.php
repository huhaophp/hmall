<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'tmall';
        $user->password = Hash::make('123456');
        $user->email   = 'tmall@qq.com';
        $user->phone   = '18312345678';
        $user->role    = 1;
        $user->save();
    }
}
