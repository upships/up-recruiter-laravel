<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileWork::class, function (Faker $faker) {
    return [
        
        	// 'profile_id' => factory(App\Models\Profile::class)->create()->id,
        	'position_id' => factory(App\Models\Data\Position::class)->create()->id,
        	'company_name' => $faker->company,
			'started_at' => $faker->dateTimeBetween('-6 years', '-3 years'),
			'ended_at' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
