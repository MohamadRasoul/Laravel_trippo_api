<?php

namespace Database\Seeders;

use App\Services\ImageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{


    public function run()
    {
        \App\Models\Plan::factory(10)->create()->each(
            function ($plan) {
                (new ImageService)->storeStaticImage(
                    model: $plan,
                    image: 'default.jpg',
                    collection: 'plan',
                    folderName: 'fallback-images'
                );
            }
        );
    }
}
