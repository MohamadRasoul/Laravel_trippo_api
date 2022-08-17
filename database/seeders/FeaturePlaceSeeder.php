<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturePlaceSeeder extends Seeder
{


    public function run()
    {
        \App\Models\FeaturePlace::factory(40)->create();
    }
}
