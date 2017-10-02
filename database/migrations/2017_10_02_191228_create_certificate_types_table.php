<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_types', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('company_id')->nullable();
            $table->integer('country_id')->nullable();

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
        Schema::dropIfExists('certificate_types');
    }
}
