<?php

namespace Database\Factories;

use App\Models\OptionPlace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OptionPlace>
 */
class OptionPlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OptionPlace::class;

    public function definition()
    {
        return [
            "place_id" => \App\Models\Place::all()->random()->id,
            "option_id" => \App\Models\Option::all()->random()->id,
        ];
    }
}
