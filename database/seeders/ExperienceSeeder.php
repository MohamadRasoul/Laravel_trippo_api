<?php

namespace Database\Seeders;

use App\Services\ImageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{


    public function run()
    {
        \App\Models\Experience::factory(10)->create()
            ->each(
                function ($experiance) {
                    (new ImageService)->storeStaticImage(
                        model: $experiance,
                        image: 'default.jpg',
                        collection: 'experiance',
                        folderName: 'fallback-images'
                    );
                    (new ImageService)->storeStaticImage(
                        model: $experiance,
                        image: 'default_1.jpg',
                        collection: 'experiance',
                        folderName: 'fallback-images'
                    );
                    (new ImageService)->storeStaticImage(
                        model: $experiance,
                        image: 'default_2.jpg',
                        collection: 'experiance',
                        folderName: 'fallback-images'
                    );
                }
            );
    }
}
