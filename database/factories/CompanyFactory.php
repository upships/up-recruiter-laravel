<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company\Company::class, function (Faker $faker) {

	$name = $faker->company

    return [
        'name' => $name,
        'description' => $faker->catchPhrase,
        'careers_link' => str_slug($company),
    ];
});
