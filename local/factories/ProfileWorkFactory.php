<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileWork::class, function (Faker $faker) {
    return [
        
        	'profile_id' => factory(App\Models\Profile::class)->create()->id,
        	'position_id' => factory(App\Models\Data\Position::class)->create()->id,
        	'company_name' => $faker->company,
			'start_date' => $faker->dateTimeBetween('-6 years', '-3 years'),
			'end_date' => $faker->dateTimeBetween('-3 years', 'now'),
    ];
});
