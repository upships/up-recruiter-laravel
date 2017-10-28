<?php

use Illuminate\Database\Seeder;

class AuxiliaryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DpTypesTableSeeder::class);
        $this->call(StcwRegulationsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(ShipTypesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
    }
}
