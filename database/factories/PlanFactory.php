<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Plan::class;

    public function definition()
    {
        return [
            "name"   => $this->faker->name(),
            "description"   => $this->faker->text(),
            "is_private"   => $this->faker->boolean(),
            "user_id"   => \App\Models\User::all()->random()->id,
            "city_id"   => \App\Models\City::all()->random()->id,

        ];
    }
}
