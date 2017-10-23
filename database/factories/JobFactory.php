<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job\Job::class, function (Faker $faker) {
    
    return [
        
  //       'company_id' => $company_id,
		// 'recruiter_id' => factory(App\Models\Company\Recruiter::class)->create(['company_id' => $company_id])->id,
		'position_id' => factory(App\Models\Data\Position::class)->create()->id,
		'ship_type_id' => $faker->numberBetween(1,10),
		'status' => $faker->randomElement([0, 1, 2]),  // 0 - not published, 1 - published, 2 - archived, 666 - cancelled
		'visibility' => $faker->randomElement([1, 2, 3]) ,  // 1 - visible, 2 - private, 3 - confidential company
    ];
});
