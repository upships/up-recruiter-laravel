<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Data\ShipType::class, function (Faker $faker) {
    return [
        'label' => $faker->randomElement(['AHTS', 'PSV', 'Containership', 'Bulk Carrier', 'PLSV']),
    ];
});
