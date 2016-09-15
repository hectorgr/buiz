<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('schoolYear', 25);
            $table->timestamps();

            $table->integer('grade_id')->unsigned()->nullable()->idex();
            $table->integer('school_id')->unsigned()->nullable()->idex();
            $table->integer('course_id')->unsigned();

            $table->unique(['name', 'schoolYear']);

            $table->foreign('grade_id')->references('id')->on('grades')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');
    }
}
