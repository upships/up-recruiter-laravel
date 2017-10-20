<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company\ProfileFolder::class, function (Faker $faker) {
    
    $company_id = factory(App\Models\Company\Company::class)->create()->id;

    return [
        
        'company_id' => $company_id,
        'recruiter_id' => factory(App\Models\Company\Recruiter::class)->create(['company_id' => $company_id])->id,
        'label' => $faker->word,
    ];
});
