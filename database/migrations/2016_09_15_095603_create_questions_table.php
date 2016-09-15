<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('question');
            $table->smallInteger('questionNumber')->unsigned()->comment('Number for sort the question in the exam.');
            $table->tinyInteger('groupNumber')->unsigned()->default(0)->comment('Number for grouping the questions with the same number of group in the exam and also for sort the groups.');
            $table->tinyInteger('value')->unsigned()->default(1);
            $table->text('feedbackOk')->nullable();
            $table->text('feedbackBad')->nullable();
            $table->text('feedbackGeneral')->nullable();
            $table->string('topicTags')->nullable();
            $table->string('suggestLink')->nullable();
            $table->timestamps();

            $table->integer('exam_id')->unsigned()->nullable()->index();
            $table->integer('questionType_id')->unsigned()->nullable()->index();

            $table->foreign('exam_id')->references('id')->on('exams')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('questionType_id')->references('id')->on('questions_types')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}
