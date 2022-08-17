<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Comment::class;

    public function definition()
    {

        return [
            "tilte" => $this->faker->text(50),
            "description" => $this->faker->text(),
            "full_date" => $this->faker->date(),
            "place_id" => \App\Models\Place::all()->random()->id,
            "plan_id" => \App\Models\Plan::all()->random()->id,
            "visit_type_id" => \App\Models\VisitType::all()->random()->id,
            "experience_id" => \App\Models\Experience::all()->random()->id,
            "user_id" => \App\Models\User::all()->random()->id,

        ];
    }
}
