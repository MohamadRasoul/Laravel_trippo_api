<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{


    public function run()
    {
        \App\Models\Feature::factory(10)->create();
    }
}
