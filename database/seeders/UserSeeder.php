<?php

namespace Database\Seeders;

use App\Services\ImageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{


    public function run()
    {
        \App\Models\User::factory(10)->create()
            ->each(
                function ($user) {
                    (new ImageService)->storeStaticImage(
                        model: $user,
                        image: 'default.jpg',
                        collection: 'user',
                        folderName: 'fallback-images'
                    );
                }
            );
    }
}
