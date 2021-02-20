<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_test_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('emp_tests');
            $table->integer('q_id');
            $table->integer('ans_opt_id')->nullable();
            $table->boolean('is_answred')->nullable();
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
        Schema::dropIfExists('emp_test_questions');
    }
}
