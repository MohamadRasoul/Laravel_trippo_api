<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserFollowerSeeder extends Seeder
{
    
    
    public function run()
    {
         \App\Models\UserFollower::factory(10)->create();
        
    }
}
