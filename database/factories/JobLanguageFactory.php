<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job\JobLanguage::class, function (Faker $faker) {
    return [
        'language_id' => $faker->numberBetween(1,10),
        'level' => $faker->numberBetween(1,4),
    ];
});
