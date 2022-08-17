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
            "ratting" => $this->faker->numberBetween(0, 5),
            "views" => $this->faker->numberBetween(1000, 30000),
            "address" => $this->faker->text(),
            "latitude" => $this->faker->latitude(),
            "longitude" => $this->faker->longitude(),
            "price_begin" => $this->faker->numberBetween(10, 200),
            "user_id" => \App\Models\User::all()->random()->id,
        ];
    }
}
