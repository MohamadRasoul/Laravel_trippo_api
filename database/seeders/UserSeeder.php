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
                    (new ImageService)->storeUrlImage(
                        model: $user,
                        image: 'https://api.lorem.space/image/face?w=150&h=150',
                        collection: 'user'
                    );
                }
            );
    }
}
