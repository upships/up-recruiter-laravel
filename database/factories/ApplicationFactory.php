<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Recruiting\Application::class, function (Faker $faker) {
    
    return [
        
  //       'job_id' => factory(App\Models\Job::class)->create()->id,
		// 'company_id' => factory(App\Models\Company::class)->create()->id,
		// 'profile_id' => factory(App\Models\Profile::class)->create()->id,
    ];
});
