<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile\ProfileDocumentRequest::class, function (Faker $faker) {
    
    //$company_id = factory(App\Models\Company::class)->create()->id;

    return [
        
  //       'profile_id' => factory(App\Models\Profile::class)->create()->id,
		// 'company_id' => $company_id,
 	// 	'selection_id' => factory(App\Models\Recruiting\Selection::class)->create(['company_id' => $company_id])->id,
		'document_type_id' => factory(App\Models\Data\DocumentType::class)->create()->id ,
		'status' => $faker->randomElement([0, 1, 666, 10]) ,
		'access_key' => random_string(40),

    ];
});
