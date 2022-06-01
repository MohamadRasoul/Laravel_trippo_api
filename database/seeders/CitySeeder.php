<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    
    
    public function run()
    {
         \App\Models\City::factory(10)->create();
        
    }
}
