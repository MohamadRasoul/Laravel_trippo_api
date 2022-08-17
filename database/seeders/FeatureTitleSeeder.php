<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureTitleSeeder extends Seeder
{


    public function run()
    {
        \App\Models\FeatureTitle::factory(10)->create();
    }
}
