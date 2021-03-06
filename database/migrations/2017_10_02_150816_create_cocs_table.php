<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cocs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('profile_id');

            $table->string('number')->nullable();

            $table->dateTime('issued_at')->nullable();
            $table->dateTime('expires_at')->nullable();

            $table->text('remarks')->nullable();

            $table->text('file')->nullable();

            $table->integer('rank_id')->nullable();
            $table->integer('country_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cocs');
    }
}
