<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    
    
    public function run()
    {
         \App\Models\Answer::factory(10)->create();
        
    }
}
