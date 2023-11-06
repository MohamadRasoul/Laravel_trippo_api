<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CitySeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            AwardSeeder::class,
            TypeSeeder::class,
            PlaceSeeder::class,
            OptionSeeder::class,
            AwardPlaceSeeder::class,
            ExperienceSeeder::class,
            BookingSeeder::class,
            PlanSeeder::class,
            FeatureTitleSeeder::class,
            FeatureSeeder::class,
            FeaturePlaceSeeder::class,
            PlanContentSeeder::class,
            FavouritePlaceSeeder::class,
            VisitTypeSeeder::class,
            CommentSeeder::class,
            ExperienceContentSeeder::class,
        ]);
    }
}
