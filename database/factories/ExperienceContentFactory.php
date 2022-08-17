<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExperienceContent>
 */
class ExperienceContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "experience_id"   => \App\Models\Experience::all()->random()->id,
            "place_id"        => \App\Models\Place::all()->random()->id,
        ];
    }
}
