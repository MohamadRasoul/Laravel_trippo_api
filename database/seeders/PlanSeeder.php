<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    
    
    public function run()
    {
         \App\Models\Plan::factory(10)->create();
        
    }
}
