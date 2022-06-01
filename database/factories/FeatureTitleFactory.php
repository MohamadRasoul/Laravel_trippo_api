<?php

namespace Database\Factories;

use App\Models\FeatureTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeatureTitle>
 */
class FeatureTitleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = FeatureTitle::class;

    public function definition()
    {
        return [
            "title"   => $this->faker->name(),
            "icon"   => $this->faker->text(),
        ];
    }
}
