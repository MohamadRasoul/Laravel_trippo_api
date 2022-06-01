<?php

namespace Database\Factories;

use App\Models\PlanContent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanContent>
 */
class PlanContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PlanContent::class;

    public function definition()
    {
        return [
            "full_date"   => $this->faker->date(now()),
            "duration"   => $this->faker->numberBetween(10,300),
            "comment"   => $this->faker->text(),
            "plan_id"   => \App\Models\Plan::all()->random()->id,
            "place_id"   => \App\Models\Place::all()->random()->id,
            "experience_id"   => \App\Models\Experience::all()->random()->id,
           
        ];
    }
}
