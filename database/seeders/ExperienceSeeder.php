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
                    (new ImageService)->storeUrlImage(
                        model: $experience,
                        image: 'https://source.unsplash.com/random/?travel,city',
                        collection: 'experience',
                    );
                    (new ImageService)->storeUrlImage(
                        model: $experience,
                        image: 'https://source.unsplash.com/random/?travel,city',
                        collection: 'experience',
                    );
                    (new ImageService)->storeUrlImage(
                        model: $experience,
                        image: 'https://source.unsplash.com/random/?travel,city',
                        collection: 'experience',
                    );
                    (new ImageService)->storeUrlImage(
                        model: $experience,
                        image: 'https://source.unsplash.com/random/?travel,city',
                        collection: 'experience',
                    );
                }
            );
    }
}
