<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\Coc::class, function (Faker $faker) {
    return [
        
        //'profile_id' => factory(App\Models\Profile::class)->create()->id,
		'number' => $faker->randomNumber(7, true),
    ];
});
