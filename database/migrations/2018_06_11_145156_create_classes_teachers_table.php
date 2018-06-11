<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes_teachers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')
                ->references('id')->on('classes')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('teacher_id')->unsigned();
            $table->foreign('teacher_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('classes_teachers');
    }
}
