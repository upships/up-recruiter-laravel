<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeamanBookTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seaman_book_types', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('company_id')->nullable();
            $table->integer('country_id')->nullable();

            $table->integer('seafarer_type_id')->nullable();
            $table->integer('ship_department_id')->nullable();

            $table->string('code')->nullable();
            $table->string('label');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seaman_book_types');
    }
}
