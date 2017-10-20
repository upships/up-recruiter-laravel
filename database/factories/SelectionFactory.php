<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Recruiting\Selection::class, function (Faker $faker) {
    
    // $company_id = factory(App\Models\Company\Company::class)->create()->id;
    // $recruiter_id = factory(App\Models\Company\Recruiter::class)->create(['company_id' => $company_id])->id;

    return [
        
  //       'company_id' => $company_id,
		// 'job_id' => factory(App\Models\Profile\Profile::class)->create(['company_id' => $company_id, 'recruiter_id' => $recruiter_id])->id,
		// 'recruiter_id' => $recruiter_id,
		'label' => $faker->jobTitle,
		'status' => $faker->randomElement([0, 1, 10]),

    ];
});
