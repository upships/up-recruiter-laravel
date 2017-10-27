<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job\JobTraining::class, function (Faker $faker) {
    return [
        
        'job_id' => factory(App\Models\Job::class)->create()->id,
    	'training_id' => $faker->numberBetween(1,10),
    ];
});
