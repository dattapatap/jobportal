<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{

    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('proffession')->nullable();
            $table->integer('experience_year')->nullable();
            $table->integer('experience_month')->nullable();
            $table->string('current_ctc')->nullable();
            $table->string('expected_ctc')->nullable();
            $table->string('location_prefered')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('resume')->nullable();
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
        Schema::dropIfExists('employee');
    }
}
