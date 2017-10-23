<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Data\Country::class, function (Faker $faker) {

	$country = strtolower($faker->countryCode);

    return [
        
        'name' => $country,
        'code' => $country,
        'icon' => "<span class='flag-icon flag-icon-$country' ></span>",
    ];
});
