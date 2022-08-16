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
                function ($experience) {
                    (new ImageService)->storeStaticImage(
                        model: $experience,
                        image: 'default.jpg',
                        collection: 'experience',
                        folderName: 'fallback-images'
                    );
                    (new ImageService)->storeStaticImage(
                        model: $experience,
                        image: 'default_1.jpg',
                        collection: 'experience',
                        folderName: 'fallback-images'
                    );
                    (new ImageService)->storeStaticImage(
                        model: $experience,
                        image: 'default_2.jpg',
                        collection: 'experience',
                        folderName: 'fallback-images'
                    );
                }
            );
    }
}
