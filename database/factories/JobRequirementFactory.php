<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job\JobRequirement::class, function (Faker $faker) {
    return [
        
        //'job_id' => factory(App\Models\Job::class)->create()->id,
        'value' => $faker->sentence,
    ];
});
