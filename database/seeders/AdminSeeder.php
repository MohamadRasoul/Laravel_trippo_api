<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    
    
    public function run()
    {
         \App\Models\Admin::factory(10)->create();
        
    }
}
