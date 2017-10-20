<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Data\StcwRegulation::class, function (Faker $faker) {
    
    $regulations = ['II/1', 'II/2', 'III/1', 'III/2', 'III/3', 'II/3', 'V/1' ];
    $regulation = $faker->randomElement($regulations);
    
    list($chapter, $item) = explode('/', $regulation);

    return [
        
        'regulation' => $regulation,
        'chapter' => $chapter,
        'item' => $item,
    ];
});
