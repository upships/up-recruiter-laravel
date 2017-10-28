<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'country_id' => $faker->numberBetween(1,10),

        'issued_at' => $faker->dateTimeBetween('-2 years', 'now'),
        'expires_at' => $faker->dateTimeBetween('-2 years', '+4 years'),
    ];
});
