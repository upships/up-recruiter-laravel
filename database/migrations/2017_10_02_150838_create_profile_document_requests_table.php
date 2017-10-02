<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileDocumentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_document_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('profile_id');
            $table->integer('company_id');
            $table->integer('selection_id');
            $table->integer('document_type_id')->nullable();

            $table->integer('status')->default(0);  // 0 - waiting, 1 - received, 666 - returned, 10 - verified

            $table->string('label')->nullable();
            $table->text('file')->nullable();
            $table->string('remarks')->nullable();
            $table->string('access_key')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_document_requests');
    }
}
