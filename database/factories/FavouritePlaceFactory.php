<?php

namespace Database\Factories;

use App\Models\FavouritePlace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeaturePlace>
 */
class FavouritePlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = FavouritePlace::class;

    public function definition()
    {
        return [
            "place_id" => \App\Models\Place::all()->random()->id,
            "user_id" => \App\Models\User::all()->random()->id,
        ];
    }
}
