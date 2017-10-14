<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company\Recruiter::class, function (Faker $faker) {

	$company_id = factory(App\Models\Company\Company::class)->create()->id;

    return [
        
        'company_id' => $company_id,
        'user_id' => factory(App\User::class)->create(['company_id' => $company_id])->id,
    ];
});
