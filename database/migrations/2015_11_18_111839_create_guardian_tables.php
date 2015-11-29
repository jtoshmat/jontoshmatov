<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardianTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('phone');
            $table->foreign('student_id')->references('student_id')->on('users')->onDelete('cascade');
            $table->unique(array('student_id', 'first_name', 'last_name', 'phone'));
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('child_guardian', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('guardian_id')->unsigned();
            $table->unsignedInteger('child_id')->unsigned();
            $table->foreign('child_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('guardian_id')->references('id')->on('users')->onDelete('cascade');

            //$table->unique(array('guardian_id', 'child_id'));
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
        Schema::dropIfExists('guardians');
        Schema::dropIfExists('child_guardian');
    }
}
