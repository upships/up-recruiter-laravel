<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Data\Training::class, function (Faker $faker) {
    return [
        
        'label' => strtoupper($faker->word),
    ];
});
