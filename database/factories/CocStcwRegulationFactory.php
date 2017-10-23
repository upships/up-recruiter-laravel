<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\CocStcwRegulation::class, function (Faker $faker) {
    
    return [
        
        'stcw_regulation_id' => $faker->numberBetween(1,10),
        
        //'coc_id' => factory(App\Models\Profile\Coc::class)->create(['profile_id' => $profile_id])->id,
        //'stcw_regulation_id' => factory(App\Models\Data\StcwRegulation::class)->create()->id,
    ];
});
