<?php

namespace Database\Seeders;

use App\Services\ImageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{


    public function run()
    {
        \App\Models\Place::factory(50)->create()->each(
            function ($place) {
                (new ImageService)->storeStaticImage(
                    model: $place,
                    image: 'default.jpg',
                    collection: 'place',
                    folderName: 'fallback-images'
                );
            }
        );
    }
}
