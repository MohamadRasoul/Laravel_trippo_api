<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Answer::class;


    public function definition()
    {
        return [
            'text' => $this->faker->text($maxNbChars = 200),
            'question_id' =>  \App\Models\Question::all()->random()->id,
            'user_id' =>  \App\Models\User::all()->random()->id,
        ];
    }
}
