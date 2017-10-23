<?php

use Illuminate\Database\Seeder;

class StcwRegulationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Data\StcwRegulation::class, 28)->create();
    }
}
