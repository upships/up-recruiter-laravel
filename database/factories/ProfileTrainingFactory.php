<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileTraining::class, function (Faker $faker) {
    return [
        
        //'profile_id' => factory(App\Models\Profile\Profile::class)->create()->id,
        'training_id' => factory(App\Models\Data\Training::class)->create()->id,
        'country_id' => factory(App\Models\Data\Country::class)->create()->id,
        'expires_on' => $faker->dateTimeBetween('now', '+5 years'),
    ];
});
