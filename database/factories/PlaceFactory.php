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
        $images = [
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7gP3htLQPb__H8vwKFuVunSxAPwLXlY0XZw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIgfJ6tUMjBM0SEbYcTgQNONofjTFTT4OgVQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSR_E-u4_VXT1t1E0BdpgvaPjhyEckgwJnhgg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToZYPWJ4heTILUTMnU0vPLhFTSBOYkFmKy-g&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDL3t7pslPUNlOMctlMKTA9Doqb-CfPQsD4w&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTmABkgMh7GY256ZrRm3BOGn8SR2TmEOWTsw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2sym9p2inlBNMrACjiFRCodsTOqAHPMfjEw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShwF4ouCiNouOPd5fdEG6vnb_wKxdWNs6yVQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSe7gmR21T8iBj2odPpz7pbQx-AzDxakTBsaQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmsntjSN9bKar8CWMJRF8oRsi7ZXFA_8xy8g&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRM0mJllJ0m2fVzdYLscTFlibH1W4slBsMHcg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbboyyPkX1sRKo4izZZ_bB4kiqtYEgVfIpqg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXLx9DFjfN4SzLmS14XwqKO2DPFvB088HXEA&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpAF5AFlxVxv1WBScQSCv3bNxBnB2dHqtvlg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOV3ZR3M2CnY-GOFhtRqF9p8fIfnxGuXFwLw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS20YaEF7bE1I8Sx5FeD9e-0dmPNVqdk2oxgA&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVPtoe71MIOIxEfGXAqNv061q_gyLhV0L_4A&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAZJ0YPyKledrBcLCpFXKvmT1MIKPdv5d7Xw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBI5jhiEP-Tb-3Xdx8dL7B7UlwSHMjUFK3Sw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3ZKKs0jNHCxELrP486aSv0OnFf7tXgv2QfA&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTmABkgMh7GY256ZrRm3BOGn8SR2TmEOWTsw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIcgudP6kofsPSWeRtgy0AUwsBs4XKCh-p2g&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQ70Dj1MiCyJKfXlE6jNW1PeCScd8zkOrdqQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZwqph6GlnNF2IIIICR2YqRabFkgrvkl182w&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsA8n_f1CB9Zv19JH_RV3R8KryEOt7ukoACA&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSd58Wxw0IpPDJPjK6IqkWzk9etYNqw1OfI0A&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTa7_3j3yxF1A4pGCMkESIqUR9X3ImkEUBhtg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc8HU4C8RxM9bESLaKODY0NoyVXc3UTqpCZQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_h_gumV3A38SHGVVWQFYMRjHv5y69WlVQHA&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFNRW4lNqb90avws9OTsdZwfNElf26Xd_23A&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIDJEZRG-CxchyPJGktyPfS3rOmOKU6zs6lg&usqp=CAU',
        ];

        return [
            "name"   => $this->faker->name(),
            "open_at"   => $this->faker->date('Y-m-d'),
            "close_at"   => $this->faker->date('Y-m-d'),
            "about"   => $this->faker->text(),
            "address"   => $this->faker->text(),
            "latitude"   => $this->faker->numberBetween(10000,300000),
            "longtude"   => $this->faker->numberBetween(10000,300000),
            "ratting"   => $this->faker->text(),
            "views"   => $this->faker->numberBetween(10,300),
            "images"   => $images[rand(0, (count($images) - 1))],
            "web_site"   => $this->faker->text($maxNbChars =200),
            "phone_number"   => $this->faker->phoneNumber(),
            "email"   => $this->faker->email(),
            "city_id"   => \App\Models\City::all()->random()->id,
            "type_id"   => \App\Models\Type::all()->random()->id,
            "admin_id"   => \App\Models\Admin::all()->random()->id,

        ];
    }
}
