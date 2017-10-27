<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company\Ship::class, function (Faker $faker) {
    return [
        
        // 'company_id' => factory(App\Models\Company::class)->create()->id,
        // 'ship_type_id' => factory(App\Models\Data\ShipType::class)->create()->id,
        // 'country_id' => $faker->numberBetween(1,10),
    ];
});
