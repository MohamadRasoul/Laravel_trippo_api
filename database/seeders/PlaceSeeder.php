<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    
    
    public function run()
    {
         \App\Models\Place::factory(10)->create();
        
    }
}
