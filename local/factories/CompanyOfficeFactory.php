<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company\CompanyOffice::class, function (Faker $faker) {
    return [
        
        'company_id' => factory(App\Models\Company::class)->create()->id,
        'label' => $faker->streetName,
        'city' => $faker->city,
        'address' => $faker->address,
        'country_id' => factory(App\Models\Data\Country::class)->create()->id,
    ];
});
