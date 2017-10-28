<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile::class, function (Faker $faker) {
    return [
        
        'user_id' => factory(App\User::class)->create()->id ,
		
		'country_of_nationality' => $faker->numberBetween(1,10) ,
		            
		'position_id' => factory(App\Models\Data\Position::class)->create()->id ,
		
		'profile_type_id' => 1 ,

		'birthday' => $faker->dateTimeBetween('-40 years', '-20 years') ,

		'city' => $faker->city ,

		'country_id' => $faker->numberBetween(1,10) ,

		'english_level' => $faker->randomElement([0, 1, 2, 3, 4]),
    ];
});
