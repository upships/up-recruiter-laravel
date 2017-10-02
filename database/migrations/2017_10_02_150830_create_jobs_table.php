<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('company_id');
            $table->integer('country_id')->nullable();
            $table->integer('position_id');
            $table->integer('recruiter_id');
            $table->integer('ship_type_id')->nullable();

            $table->string('instructions');
            $table->integer('status')->default(0);  // 0 - not published, 1 - published, 2 - archived, 666 - cancelled
            $table->integer('step')->default(0);

            $table->datetime('expires_on');

            $table->text('description')->nullable();
            
            $table->string('rotation')->nullable();
            
            $table->string('slug')->nullable();

            $table->string('salary')->nullable();

            $table->integer('visibility')->default(1);  // 1 - visible, 2 - private, 3 - confidential company

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
