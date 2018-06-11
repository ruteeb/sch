<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHourStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hour_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hour');
            $table->date('date');
            $table->date('start_date_lesson');
            $table->date('end_date_lesson');

            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')
                ->references('id')->on('classes')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
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
        Schema::dropIfExists('hour_students');
    }
}
