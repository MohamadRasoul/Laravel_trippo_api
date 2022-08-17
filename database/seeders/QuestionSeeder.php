<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{


    public function run()
    {
        \App\Models\Question::factory(10)->create();
    }
}
