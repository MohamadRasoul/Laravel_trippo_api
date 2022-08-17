<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanContentSeeder extends Seeder
{


    public function run()
    {
        \App\Models\PlanContent::factory(10)->create();
    }
}
