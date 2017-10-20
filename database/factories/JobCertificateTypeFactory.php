<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job\JobCertificateType::class, function (Faker $faker) {
    return [
        
        //'job_id' => factory(App\Models\Job\Job::class)->create()->id,
        'certificate_type_id' => factory(App\Models\Data\CertificateType::class)->create()->id
    ];
});
