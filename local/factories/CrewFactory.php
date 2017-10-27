<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company\Crew::class, function (Faker $faker) {
    return [
        
        'company_id' => factory(App\Models\Company::class)->create()->id,
        'label' => $faker->city,

    ];
});
