<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileCertificate::class, function (Faker $faker) {
    return [
       	
    	'profile_id' => factory(App\Models\Profile\Profile::class)->create()->id,
		'certificate_type_id' => factory(App\Models\Data\CertificateType::class)->create()->id,
		'country_id' => factory(App\Models\Data\Country::class)->create()->id
    ];
});
