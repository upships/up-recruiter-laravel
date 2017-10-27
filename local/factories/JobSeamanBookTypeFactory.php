<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job\JobSeamanBookType::class, function (Faker $faker) {
    
    return [
        
        'job_id' => factory(App\Models\Job::class)->create()->id,
    	'seaman_book_type_id' => $faker->numberBetween(1,10),
    ];
});
