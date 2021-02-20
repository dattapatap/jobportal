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
            $table->foreign('rec_id')->references('id')->on('recruiters')->onDelete('cascade');;
            $table->string('job_title');
            $table->index('job_role');
            $table->foreign('job_role')->references('id')->on('job_positions')->onDelete('cascade');
            $table->index('job_industry');
            $table->foreign('job_industry')->references('id')->on('industries')->onDelete('cascade');
            $table->string('job_type');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->integer('min_exp');
            $table->integer('max_exp');
            $table->index('job_location');
            $table->foreign('job_location')->references('id')->on('cities')->onDelete('cascade');
            $table->string('job_eligibility');
            $table->integer('job_tot_positions');
            $table->longText('job_desc');
            $table->boolean('status')->default(1);
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
