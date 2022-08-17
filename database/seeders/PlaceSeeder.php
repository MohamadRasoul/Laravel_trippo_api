<?php

namespace Database\Seeders;

use App\Services\ImageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{


    public function run()
    {
        \App\Models\Place::factory(20)->create()->each(
            function ($place) {
                (new ImageService)->storeUrlImage(
                    model: $place,
                    image: 'https://source.unsplash.com/random/?travel,city',
                    collection: 'place',
                );
                (new ImageService)->storeUrlImage(
                    model: $place,
                    image: 'https://source.unsplash.com/random/?travel,city',
                    collection: 'place',
                );
            }
        );
    }
}
