<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileDocument::class, function (Faker $faker) {
    return [
        //'profile_id' => factory(App\Models\Profile::class)->create()->id,
        'label' => $faker->word,
    ];
});
