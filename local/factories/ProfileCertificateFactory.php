<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileCertificate::class, function (Faker $faker) {
    return [
       	
    	'profile_id' => factory(App\Models\Profile::class)->create()->id,
		'certificate_type_id' => factory(App\Models\Data\CertificateType::class)->create()->id,
		'country_id' => $faker->numberBetween(1,10),

		'expires_at' => $faker->dateTimeBetween('now', '+5 years'),
		'issued_at' => $faker->dateTimeBetween('-2 years', 'now'),
    ];
});
