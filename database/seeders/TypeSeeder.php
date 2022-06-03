<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    
    
    public function run()
    {
         \App\Models\Type::factory(10)->create();
        
    }
}
