<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company\Ship::class, function (Faker $faker) {
    return [
        
        'company_id' => factory(App\Models\Company\Company::class)->create()->id,
        'ship_type_id' => factory(App\Models\Data\ShipType::class)->create()->id,
        'country_id' => factory(App\Models\Data\Country::class)->create()->id,
    ];
});
