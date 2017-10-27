<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job\JobStcwRegulation::class, function (Faker $faker) {
    return [
        
        //'job_id' => factory(App\Models\Job::class)->create()->id,
    	'stcw_regulation_id' => $faker->numberBetween(1,10),
    ];
});
