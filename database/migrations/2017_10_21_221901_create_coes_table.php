<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('profile_id');
            $table->integer('country_id');

            $table->dateTime('issued_on')->nullable();
            $table->dateTime('expires_on')->nullable();

            $table->string('remarks')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coes');
    }
}
