<?php

namespace Database\Factories;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Option>
 */
class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Option::class;

    public function definition()
    {
        return [
            "name"   => $this->faker->name(),
            "views"   => $this->faker->numberBetween(10,300),
            "type_id"   => \App\Models\Type::all()->random()->id,
        ];
    }
}
