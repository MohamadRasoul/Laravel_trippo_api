<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceContentSeeder extends Seeder
{
    
    
    public function run()
    {
         \App\Models\ExperienceContent::factory(10)->create();
    }
}
