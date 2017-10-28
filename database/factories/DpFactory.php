<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\Dp::class, function (Faker $faker) {
    
    $dpTypes = [1, 2, 3, 4, 5];

    return [
        
        //'profile_id' => factory(App\Models\Profile::class)->create()->id,
		'dp_type_id' => $faker->randomElement($dpTypes),
		'number' => $faker->randomNumber(7, true),

		'issued_at' => $faker->dateTimeBetween('-2 years', 'now'),
        'expires_at' => $faker->dateTimeBetween('-2 years', '+4 years'),
    ];
});
