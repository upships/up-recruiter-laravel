<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Data\CertificateType::class, function (Faker $faker) {

	$labels =   [
                    'HUET',
                    'BCO',
                    'BOSIET',
                    'RESCUE BOAT',
                    'BSTS',
                    'AFF',
                    'BSTP',
                    'FRB',
                    'ECDIS',
                    'PSC&RB',
                    'CHEMICAL HANDLING',
                    'RADIO OPERATOR',
                    'MFA',
                    'CTS',
                    'DP',
                    'PDSD',
                    'EFA',
                    'TFC',
                    'BRM',
                    'HLO',
                    'SSO',
                    'MARPOL 73',
                    'GOC',
                ];

    return [
        
        'label' => $faker->randomelement($labels)
    ];
});
