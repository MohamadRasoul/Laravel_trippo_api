<?php

namespace Database\Seeders;

use App\Services\ImageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{


    public function run()
    {
        \App\Models\Comment::factory(100)->create()
            ->each(
                function ($comment) {
                    (new ImageService)->storeUrlImage(
                        model: $comment,
                        image: 'https://source.unsplash.com/random/?travel,city',
                        collection: 'comment',
                    );
                }
            );
    }
}
