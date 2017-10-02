<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_ships', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('profile_id');
            $table->integer('profile_work_id');
            $table->integer('ship_type_id');
            
            $table->integer('name')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_ships');
    }
}
