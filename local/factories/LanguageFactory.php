<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Data\Language::class, function (Faker $faker) {
    
    $language = $faker->languageCode;

    return [
        
        'label' => $language,
        'code' => $language,
        'native_label' => $language,
    ];
});
