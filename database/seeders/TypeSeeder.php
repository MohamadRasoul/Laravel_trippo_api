<?php

namespace Database\Seeders;

use App\Services\ImageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{


    public function run()
    {
        \App\Models\Type::insert([
            [
                'name'  => "Hotel",
            ],
            [
                'name'  => "Thing To Do",
            ],
            [
                'name'  => "Restaurant",
            ],
        ]);
    }
}
