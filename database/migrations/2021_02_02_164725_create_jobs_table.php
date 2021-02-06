<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('rec_id');
            $table->foreign('rec_id')->references('id')->on('recruiters');
            $table->string('job_title');
            $table->string('job_role');
            $table->string('job_industry');
            $table->string('job_type');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->integer('min_exp');
            $table->integer('max_exp');
            $table->string('job_location');
            $table->string('job_eligibility');
            $table->integer('job_tot_positions');
            $table->longText('job_desc');
            $table->softDeletes();
            $table->timestamps();
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
