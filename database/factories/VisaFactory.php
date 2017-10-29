<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\Visa::class, function (Faker $faker) {
    
    return [
        
        //'profile_id' => factory(App\Models\Profile::class)->create()->id,
		'number' => $faker->randomNumber(7, true),
		'country_id' => $faker->numberBetween(1,10),

		'type' => $faker->randomElement(['Work']),

		'issued_at' => $faker->dateTimeBetween('-2 years', 'now'),
        'expires_at' => $faker->dateTimeBetween('-2 years', '+4 years'),

    ];
});
