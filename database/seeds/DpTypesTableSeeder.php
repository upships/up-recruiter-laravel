<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DpTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dp_types')->insert([
                	['label' => "Doesn't have"],
                	['label' => 'Basic'],
                	['label' => 'Limited'],
                	['label' => 'Unlimited'],
                	['label' => 'Maintenance'],
                ]
        	);
    }
}
