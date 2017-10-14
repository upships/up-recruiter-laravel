<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Data\Currency::class, function (Faker $faker) {
    
    $currency = $faker->currencyCode;
    
    return [
    	'label' => $currency,
    	'code' => $currency,
    ];
});
