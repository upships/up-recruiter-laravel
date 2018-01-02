<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProfileFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {

          $table->integer('country_of_nationality')->nullable()->change();

          $table->integer('position_id')->nullable()->change();
          $table->integer('profile_type_id')->nullable()->change();
          $table->dateTime('birthday')->nullable()->change();
          $table->string('city')->nullable()->change();
          $table->integer('country_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
        });
    }
}
