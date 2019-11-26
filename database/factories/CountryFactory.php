<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
      'country_name' => $faker->unique()->country,
      'about' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'continent' => $faker->word
    ];
});
