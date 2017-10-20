<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job\JobShipType::class, function (Faker $faker) {
    return [
        
        'job_id' => factory(App\Models\Job\Job::class)->create()->id,
    	'ship_type_id' => $faker->numberBetween(1,10),
    	'months' => $faker->randomElement([12,18,24,36]),
    ];
});
