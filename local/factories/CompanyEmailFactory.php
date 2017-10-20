<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company\CompanyEmail::class, function (Faker $faker) {
    return [
        
        'company_id' => factory(App\Models\Company\Company::class)->create()->id,
        'label' => $faker->jobTitle,
        'address' => $faker->companyEmail,
    ];
});
