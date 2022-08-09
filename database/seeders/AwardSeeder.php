<?php

namespace Database\Seeders;

use App\Services\ImageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{


    public function run()
    {
        \App\Models\Award::factory(10)->create()->each(
            function ($award) {
                (new ImageService)->storeStaticImage(
                    model: $award,
                    image: 'default.jpg',
                    collection: 'award',
                    folderName: 'fallback-images'
                );
            }
        );
    }
}
