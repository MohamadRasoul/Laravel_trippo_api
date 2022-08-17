<?php

namespace Database\Seeders;

use App\Services\ImageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{


    public function run()
    {
        \App\Models\City::factory(10)->create()
            ->each(
                function ($city) {
                    (new ImageService)->storeUrlImage(
                        model: $city,
                        image: 'https://source.unsplash.com/random/?travel,city',
                        collection: 'city',
                    );
                    (new ImageService)->storeUrlImage(
                        model: $city,
                        image: 'https://source.unsplash.com/random/?travel,city',
                        collection: 'city_admin',
                    );
                    (new ImageService)->storeUrlImage(
                        model: $city,
                        image: 'https://source.unsplash.com/random/?travel,city',
                        collection: 'city_admin',
                    );
                    (new ImageService)->storeUrlImage(
                        model: $city,
                        image: 'https://source.unsplash.com/random/?travel,city',
                        collection: 'city_admin',
                    );
                }
            );
    }
}
