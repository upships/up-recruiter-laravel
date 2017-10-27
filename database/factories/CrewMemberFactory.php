<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company\CrewMember::class, function (Faker $faker) {

    return [
        
        //'company_id' => $company_id,
		//'crew_id' => factory(App\Models\Company\Crew::class)->create(['company_id' => $company_id])->id,
		//'profile_id' => factory(App\Models\Profile::class)->create()->id,

    ];
});
