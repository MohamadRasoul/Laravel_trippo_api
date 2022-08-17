<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = City::class;


    public function definition()
    {
        return [
            "name"           => $this->faker->city(),
            "description"   => $this->faker->text(),
            "latitude"       => $this->faker->latitude,
            "longitude"      => $this->faker->longitude,
            "views"          => $this->faker->numberBetween(10,300),
        ];
    }
}
