<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClosedAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closed_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer');
            $table->tinyInteger('solution')->unsigned()->comment('0 = False; 1 = True; 2= The answer field is the solution');
            $table->decimal('score', 2, 1)->default(0);
            $table->timestamps();

            $table->integer('question_id')->unsigned()->index();

            $table->foreign('question_id')->references('id')->on('questions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('closed_answers');
    }
}
