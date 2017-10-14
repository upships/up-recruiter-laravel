<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\Dp::class, function (Faker $faker) {
    
    $dpTypes = [0, 1, 2, 3, 4];

    return [
        
        'profile_id' => factory(App\Models\Profile\Profile::class)->create()->id,
		'dp_type_id' => $faker->randomElement($dpTypes),
		'number' => $faker->randomNumber(7, true),
    ];
});
