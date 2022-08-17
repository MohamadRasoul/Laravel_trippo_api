<?php

namespace Database\Factories;

use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Place::class;

    public function definition()
    {


        return [
            "name" => $this->faker->sentence(4,  true),
            "open_at" => $this->faker->time(),
            "close_at" => $this->faker->time(),
            "about" => $this->faker->text(),
            "address" => $this->faker->text(),
            "latitude" => $this->faker->latitude($min = 30, $max = 36),
            "longitude" => $this->faker->longitude($min = 30, $max = 36),
            "ratting" => $this->faker->numberBetween(1, 5),
            "views" => $this->faker->numberBetween(10, 300),
            "web_site" => $this->faker->text($maxNbChars = 200),
            "phone_number" => $this->faker->phoneNumber(),
            "email" => $this->faker->email(),
            "city_id" => \App\Models\City::all()->random()->id,
            "type_id" => \App\Models\Type::all()->random()->id,
            "admin_id" => \App\Models\Admin::all()->random()->id,

        ];
    }
}
