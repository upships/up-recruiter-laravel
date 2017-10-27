<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileShip::class, function (Faker $faker) {
    
    $profile_id = factory(App\Models\Profile::class)->create()->id;

    return [
        
			'profile_id' => $profile_id,
			'profile_work_id' => factory(App\Models\Profile\ProfileWork::class)->create(['profile_id' => $profile_id])->id,
			'ship_type_id' => factory(App\Models\Data\ShipType::class)->create()->id,
    ];
});
