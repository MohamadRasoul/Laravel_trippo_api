<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    
    
    public function run()
    {
         \App\Models\Experience::factory(10)->create();
        
    }
}
