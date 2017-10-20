<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\CocStcwRegulation::class, function (Faker $faker) {
    
    $profile_id = factory(App\Models\Profile\Profile::class)->create()->id;

    return [
        
        'profile_id' => $profile_id,
        //'coc_id' => factory(App\Models\Profile\Coc::class)->create(['profile_id' => $profile_id])->id,
        //'stcw_regulation_id' => factory(App\Models\Data\StcwRegulation::class)->create()->id,
    ];
});
