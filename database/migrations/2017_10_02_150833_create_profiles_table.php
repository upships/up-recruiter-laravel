<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('user_id');
            $table->integer('nationality');
            $table->integer('education_level_id')->nullable();
            
            $table->integer('position_id');
            $table->integer('profile_type_id');
            $table->integer('ship_department_id')->nullable();

            $table->integer('gender')->nullable();
            $table->dateTime('birthday');
            $table->integer('marital_status')->nullable();

            $table->string('city');
            $table->string('state')->nullable();
            $table->integer('country_id');

            $table->string('passport')->nullable();
            $table->dateTime('passport_expires_on')->nullable();

            $table->integer('english_level')->default(0);
            $table->integer('native_language')->nullable();

            $table->integer('registration_step')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
