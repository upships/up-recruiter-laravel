<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileExtra::class, function (Faker $faker) {
    return [
        
        //'profile_id' => factory(App\Models\Profile::class)->create()->id,
        'label' => $faker->word,
    ];
});
