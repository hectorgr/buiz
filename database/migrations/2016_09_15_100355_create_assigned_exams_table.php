<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('isFinalized');
            $table->boolean('isException')->default(0)->comment('If is false use the parameters from exams table, else if is true use the parameters from exceptions table.');
            $table->decimal('score', 3, 2);
            $table->timestamps();

            $table->integer('exam_id')->unsigned()->index();
            $table->integer('enroll_id')->unsigned()->index();

            $table->foreign('exam_id')->references('id')->on('exams')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('assigned_exams');
    }
}
