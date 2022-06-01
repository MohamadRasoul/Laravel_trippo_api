<?php

namespace Database\Factories;

use App\Models\FeaturePlace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeaturePlace>
 */
class FeaturePlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = FeaturePlace::class;

    public function definition()
    {
        return [
            "description"   => $this->faker->text(),
            "place_id"   =>\App\Models\Place::all()->random()->id,
            "feature_id"   =>\App\Models\Feature::all()->random()->id,

        ];
    }
}
