<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLongResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('long_responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('response')->nullable();
            $table->decimal('score', 2, 1)->default(0);
            $table->timestamps();

            $table->integer('question_id')->unsigned();
            $table->integer('enroll_id')->unsigned();

            $table->unique(['question_id', 'enroll_id']);

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
        Schema::drop('long_responses');
    }
}
