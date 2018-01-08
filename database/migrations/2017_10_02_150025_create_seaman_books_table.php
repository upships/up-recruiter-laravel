<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeamanBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seaman_books', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('profile_id');

            $table->integer('country_id')->nullable();
            $table->integer('seaman_book_type_id')->nullable();
            $table->string('number')->nullable();
            $table->dateTime('issued_at')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->text('remarks')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seaman_books');
    }
}
