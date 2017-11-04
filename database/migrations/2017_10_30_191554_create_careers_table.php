<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            
            $table->increments('id');
            $table->timestamps();

            $table->integer('company_id');

            $table->json('content')->nullable();
            $table->json('slides')->nullable();
            $table->json('images')->nullable();
            $table->json('menus')->nullable();
            $table->json('settings')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('careers');
    }
}
