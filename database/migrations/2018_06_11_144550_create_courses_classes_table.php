<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_classes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')
                ->references('id')->on('classes')
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
        Schema::dropIfExists('courses_classes');
    }
}
