<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->smallInteger('userType')->comment('Teacher = 0, Student = 1');
            $table->string('names');
            $table->string('lastName');
            $table->string('lastName2')->nullable();
            $table->enum('sex', ['Male', 'Female'])->nullable();
            $table->string('photoName', 100)->nullable();
            $table->string('photoExt', 5)->nullable();
            $table->boolean('status')->default(false);
            $table->string('tokenActivation')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
