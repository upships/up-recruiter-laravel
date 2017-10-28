<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_works', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('profile_id');
            $table->integer('position_id');

            $table->string('company_name');
            
            $table->dateTime('started_at');
            $table->dateTime('ended_at')->nullable();

            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_works');
    }
}
