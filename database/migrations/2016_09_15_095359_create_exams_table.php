<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('instructions')->nullable();
            $table->enum('evaluationType', ['Formative', 'Summative']);
            $table->enum('presentationType', ['Individual', 'Grouped', 'All'])->comment('Show questions one by one, in question groups or all the questions.');
            $table->enum('feedbackType', ['Individual', 'Grouped', 'All'])->comment('Show feedback after submit each question, after submit each group of questions or at finish of the exam.');
            $table->boolean('autoCalculateScore')->comment('Calculate the score based in the quantity of questions/responses and the value of the scale.');
            $table->boolean('randomSortQuestions');
            $table->boolean('randomSortAnswers');
            $table->boolean('showPartialResults')->comment('Show to student the score and results even if exists questions without rating.');
            $table->boolean('showAverageScore')->comment('Show to student the group average score.');
            $table->boolean('showStatistics')->comment('Show to student the statistics of knowledge of topics.');
            $table->dateTime('opening')->comment('Date and time for show the exam (without permission to answer).');
            $table->dateTime('closing')->comment('Date and time for lock the access to review the results o the exam.');

            // Parameters for students
            $table->dateTime('availableSince')->comment('Date and time for access to respond the exam.');
            $table->dateTime('availableUntil')->comment('Date and time for lock the access to respond the exam');
            $table->smallInteger('timeLimit')->unsigned()->comment('Quantity of time in minutes to solve the exam.');
            $table->tinyInteger('attemptsLimit')->unsigned()->default(0)->comment('Quantity of attempts to solve the exam.');
            $table->tinyInteger('valueScale')->unsigned()->default(0)->comment('Percentage of scale of the course assigned for the exam.');
            $table->string('accessCode', 15)->nullable()->comment('Access code restriction for solve the exam.');
            $table->ipAddress('ipAddress')->nullable()->comment('Ip Address restriction for solve the exam.');

            $table->timestamps();

            $table->integer('course_id')->unsigned()->index();
            $table->bigInteger('logo1_id')->unsigned()->nullable()->index();
            $table->bigInteger('logo2_id')->unsigned()->nullable()->index();

            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('logo1_id')->references('id')->on('files')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('logo2_id')->references('id')->on('files')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exams');
    }
}
