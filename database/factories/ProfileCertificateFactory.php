<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileCertificate::class, function (Faker $faker) {
    return [
       	
  //   	'profile_id' => factory(App\Models\Profile::class)->create()->id,
		'certificate_type_id' => $faker->numberBetween(1,10),
		'country_id' => $faker->numberBetween(1,10),
		'issued_at' => $faker->dateTimeBetween('-2 years', 'now'),
        'expires_at' => $faker->dateTimeBetween('-2 years', '+4 years'),
    ];
});
