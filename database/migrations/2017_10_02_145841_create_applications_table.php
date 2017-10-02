<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('job_id');
            $table->integer('company_id');
            $table->integer('profile_id');
            $table->integer('selection_id')->nullable();
            $table->integer('recruiter_id')->nullable();

            $table->integer('status')->default(0);
            $table->integer('type')->default(1);
            
            $table->integer('salary')->nullable();

            $table->text('remarks')->nullable();
            $table->text('response')->nullable();
            $table->text('notes')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
