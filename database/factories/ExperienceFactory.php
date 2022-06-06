<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Experience::class;

    public function definition()
    {

        return [
            "name" => $this->faker->name(),
            "about" => $this->faker->text(),
            "ratting" => $this->faker->text(),
            "views" => $this->faker->numberBetween(10000, 300000),
            "address" => $this->faker->text(),
            "latitude" => $this->faker->numberBetween(10000, 300000),
            "longtude" => $this->faker->numberBetween(10000, 300000),
            "city_id" => \App\Models\City::all()->random()->id,
            "type_id" => \App\Models\Type::all()->random()->id,
            "user_id" => \App\Models\User::all()->random()->id,

        ];
    }
}
