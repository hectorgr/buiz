<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_exceptions', function (Blueprint $table) {
            $table->increments('id');

            // Same parameters from exams
            $table->dateTime('availableSince')->comment('Date and time for access to respond the exam.');
            $table->dateTime('availableUntil')->comment('Date and time for lock the access to respond the exam');
            $table->smallInteger('timeLimit')->unsigned()->comment('Quantity of time in minutes to solve the exam.');
            $table->tinyInteger('attemptsLimit')->unsigned()->default(0)->comment('Quantity of attempts to solve the exam.');
            $table->tinyInteger('valueScale')->unsigned()->default(0)->comment('Percentage of scale of the course assigned for the exam.');
            $table->string('accessCode', 15)->nullable()->comment('Access code restriction for solve the exam.');
            $table->ipAddress('ipAddress')->nullable()->comment('Ip Address restriction for solve the exam.');

            $table->timestamps();

            $table->integer('assigned_id')->unsigned()->index();

            $table->foreign('assigned_id')->references('id')->on('assigned_exams')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assigned_exceptions');
    }
}
