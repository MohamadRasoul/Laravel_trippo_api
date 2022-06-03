<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Booking::class;

    public function definition()
    {
        return [
            "name"   => $this->faker->name(),
            "start_date"   => $this->faker->date(),
            "end_date"   => $this->faker->date(),
            "price"   => $this->faker->numberBetween(10000,300000),
            "people_count"   => $this->faker->numberBetween(10000,300000),
            "is_active"   => $this->faker->boolean(),
            "experience_id"   =>\App\Models\Experience::all()->random()->id,
        ];
    }
}
