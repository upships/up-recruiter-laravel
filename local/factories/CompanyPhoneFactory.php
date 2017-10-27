<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company\CompanyPhone::class, function (Faker $faker) {
    return [
        
        'company_id' => factory(App\Models\Company::class)->create()->id,
        'label' => $faker->jobTitle,
        'country_code' => $faker->randomNumber(3),
        'number' => $faker->phoneNumber,
    ];
});
