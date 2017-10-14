<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Data\DocumentType::class, function (Faker $faker) {
    
    return [
    	 'label' => $faker->word,   
    ];
});
