<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Data\SeamanBookType::class, function (Faker $faker) {
    
    return [
        'label' => $faker->randomElement(['MNC', 'MOC', '1ON', '1OM', 'CMT', 'IMT', '2OM', '2ON', 'POM', 'PON', 'TAA']),
    ];
});
