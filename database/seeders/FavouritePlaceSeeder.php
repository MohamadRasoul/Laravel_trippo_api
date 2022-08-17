<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavouritePlaceSeeder extends Seeder
{
    
    
    public function run()
    {
         \App\Models\FavouritePlace::factory(10)->create();
    }
}
