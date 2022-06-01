<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\City::factory(10)->create();
        \App\Models\Admin::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Question::factory(10)->create();
        \App\Models\Answer::factory(10)->create();
        \App\Models\Award::factory(10)->create();
        \App\Models\Type::factory(10)->create();
        \App\Models\Place::factory(10)->create();
        \App\Models\Option::factory(10)->create();
        \App\Models\AwardPlace::factory(10)->create();
        \App\Models\Experience::factory(10)->create();
        \App\Models\Booking::factory(10)->create();
        \App\Models\Plan::factory(10)->create();
        \App\Models\FeatureTitle::factory(10)->create();
        \App\Models\Feature::factory(10)->create();
        \App\Models\FeaturePlace::factory(10)->create();
        \App\Models\PlanContent::factory(10)->create();
    }
}
