<?php

use Illuminate\Database\Seeder;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ranks')->insert([
        ['label' => 'Captain / Master', 'code' => 'M'],
        ['label' => 'Chief Officer', 'code' => 'C/O'],
        ['label' => 'Second Officer', 'code' => '2O'],
        ['label' => 'Third Officer', 'code' => '3O'],
        ['label' => 'Chief Engineer', 'code' => 'C/E'],
        ['label' => 'Second Engineer', 'code' => '2E']
      ]);
    }
}
