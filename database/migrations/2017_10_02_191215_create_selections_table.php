<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selections', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('company_id');
            $table->integer('job_id')->nullable();
            $table->integer('recruiter_id');

            $table->string('label')->nullable();

            $table->integer('status')->default(0); // 0 - not active, 1 - active, 10 - closed, 666 - cancelled

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selections');
    }
}
