<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionPaperQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_paper_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qp_id');
            $table->foreign('qp_id')->references('id')->on('question_papers');
            $table->unsignedBigInteger('q_id');
            $table->foreign('q_id')->references('id')->on('questions');            
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
        Schema::dropIfExists('question_paper_questions');
    }
}
