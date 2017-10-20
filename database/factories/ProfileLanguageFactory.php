<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileLanguage::class, function (Faker $faker) {
    return [
        
        //'profile_id' => factory(App\Models\Profile\Profile::class)->create()->id,
        'language_id' => $faker->numberBetween(1,10),
        'level' => $faker->randomElement([0, 1, 2, 3, 4]),
    ];
});
