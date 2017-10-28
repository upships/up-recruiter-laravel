<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileTraining::class, function (Faker $faker) {
    return [
        
        //'profile_id' => factory(App\Models\Profile::class)->create()->id,
        'training_id' => factory(App\Models\Data\Training::class)->create()->id,
        'country_id' => $faker->numberBetween(1,10),
        'expires_at' => $faker->dateTimeBetween('now', '+5 years'),
    ];
});
