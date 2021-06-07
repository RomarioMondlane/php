<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>'Romario Monjane',
            'email'=>'romario@admin.com',
            'password' =>bcrypt('romariomonjane'),


        ]);
        User::create([
            'name' =>'Romario Monjane',
            'email'=>'romario@misau.com',
            'password' =>bcrypt('romariomonjane'),


        ]);
    }
}
