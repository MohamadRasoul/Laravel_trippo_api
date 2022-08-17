<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{


    public function run()
    {
        \App\Models\Section::factory(10)->create();
    }
}
