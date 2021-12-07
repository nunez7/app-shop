<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=> 'Felix',
            'email'=> 'felixjavier0@gmail.com',
            'password'=> bcrypt('123123'),
            'admin'=> true
        ]);
    }
}
