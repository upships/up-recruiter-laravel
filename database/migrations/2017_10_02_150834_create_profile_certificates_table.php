<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('profile_id');
            $table->integer('certificate_type_id');
            $table->integer('country_id');
            $table->boolean('verified')->default(false);

            $table->text('file')->nullable();
            $table->text('remarks')->nullable();

            $table->date('issued_on')->nullable();
            $table->date('expires_on')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_certificates');
    }
}
