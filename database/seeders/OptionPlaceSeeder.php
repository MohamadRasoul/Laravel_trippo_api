<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionPlaceSeeder extends Seeder
{


    public function run()
    {
        \App\Models\OptionPlace::factory(10)->create();
    }
}
