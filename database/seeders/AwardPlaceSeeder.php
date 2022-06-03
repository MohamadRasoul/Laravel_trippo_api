<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AwardPlaceSeeder extends Seeder
{
    
    
    public function run()
    {
         \App\Models\AwardPlace::factory(10)->create();
        
    }
}
