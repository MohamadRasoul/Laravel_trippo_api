<?php

namespace Database\Factories;

use App\Models\AwardPlace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AwardPlace>
 */
class AwardPlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AwardPlace::class;


    public function definition()
    {
        return [
            "place_id"   => \App\Models\Place::all()->random()->id,
            "option_id"   => \App\Models\Option::all()->random()->id,
        ];
    }
}
