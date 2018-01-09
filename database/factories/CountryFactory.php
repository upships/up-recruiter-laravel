<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Data\Country::class, function (Faker $faker) {

	$country = strtolower($faker->countryCode);

    return [

        'name' => strtoupper($country) . ' ' . $country,
        'code' => strtoupper($country),
        'icon' => "<span class='flag-icon flag-icon-$country' ></span>",
    ];
});
