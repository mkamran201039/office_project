<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            ['name'=>'shafiul', 'email'=>'shafiul.job.cse@gmail.com', 'password'=>'123' ],
            ['name'=>'hasan', 'email'=>'hasan.job.cse@gmail.com', 'password'=>'456' ],
            ['name'=>'abrar', 'email'=>'abrar.job.cse@gmail.com', 'password'=>'789' ],
        ];
        User::insert($user);
    }
}
