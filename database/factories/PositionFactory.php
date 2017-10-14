<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Data\Position::class, function (Faker $faker) {
    return [
        
        'label' => $faker->jobTitle,
		'type' => $faker->randomElement([1,2]),
    ];
});
