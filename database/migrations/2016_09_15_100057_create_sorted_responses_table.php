<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortedResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorted_responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('response')->nullable();
            $table->tinyInteger('responseNumber')->unsigned()->nullable()->comment('The number of response for compare in question solution if is necesary for the typo of question.');
            $table->decimal('score', 2, 1)->default(0);
            $table->timestamps();

            $table->integer('question_id')->unsigned()->index();
            $table->integer('enroll_id')->unsigned()->index();

            $table->foreign('question_id')->references('id')->on('questions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('enroll_id')->references('id')->on('enrollees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sorted_responses');
    }
}
