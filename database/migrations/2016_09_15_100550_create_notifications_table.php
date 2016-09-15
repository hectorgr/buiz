<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->boolean('isRead')->default(0);
            $table->timestamps();

            $table->integer('enroll_id')->unsigned()->index();
            $table->integer('exam_id')->unsigned()->nullable()->index();

            $table->foreign('enroll_id')->references('id')->on('enrollees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notifications');
    }
}
