<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\SeamanBook::class, function (Faker $faker) {
    return [
        
        'profile_id' => factory(App\Models\Profile::class)->create()->id,
        'seaman_book_type_id' => factory(App\Models\Data\SeamanBookType::class)->create()->id,
        'number' => $faker->randomNumber(7, true),
        'expires_at' => $faker->dateTimeBetween('-2 years', '+4 years'),
        'issued_at' => $faker->dateTimeBetween('-2 years', 'now'),
    ];
});
