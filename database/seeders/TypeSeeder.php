<?php

namespace Database\Seeders;

use App\Services\ImageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{


    public function run()
    {
        \App\Models\Type::factory(10)->create()->each(
            function ($type) {
                (new ImageService)->storeStaticImage(
                    model: $type,
                    image: 'default.jpg',
                    collection: 'type',
                    folderName: 'fallback-images'
                );
            }
        );;
    }
}
