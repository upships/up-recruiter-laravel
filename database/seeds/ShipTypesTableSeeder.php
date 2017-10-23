<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ship_types')->insert([

        	['label' => 'AHTS'],
        	['label' => 'PSV'],
        	['label' => 'Containership'],
        	['label' => 'Bulk Carrier'],
        	['label' => 'PLSV'],
        	['label' => 'CSV'],
        	['label' => 'Tanker'],
        	['label' => 'Dredger'],
        	['label' => 'Drillship'],
        	['label' => 'Tug'],

        ]);
    }
}
