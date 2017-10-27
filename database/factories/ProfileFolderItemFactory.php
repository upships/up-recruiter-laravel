<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company\ProfileFolderItem::class, function (Faker $faker) {
    
    return [
        
    	// 'profile_id' => factory(App\Models\Profile::class)->create()->id,
    	// 'folder_id' => factory(App\Models\Company\ProfileFolderItem::class)->create()->id
    ];
});
