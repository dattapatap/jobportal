<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('employee');
            $table->integer('tot_ques');
            $table->time('max_time');
            $table->integer('last_q_no')->default(1);
            $table->string('status');
            $table->time('rem_time');
            $table->date('test_scheduled');
            $table->unsignedBigInteger('slot_id');
            $table->foreign('slot_id')->references('id')->on('test_slots');
            $table->dateTime('test_taken')->nullable();
            $table->integer('test_category')->nullable();
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
        Schema::dropIfExists('emp_tests');
    }
}
