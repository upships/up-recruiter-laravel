<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileLanguage::class, function (Faker $faker) {
    return [
        
        'profile_id' => factory(App\Models\Profile::class)->create()->id,
        'language_id' => factory(App\Models\Data\Language::class)->create()->id,
        'level' => $faker->randomElement([0, 1, 2, 3, 4]),
    ];
});
