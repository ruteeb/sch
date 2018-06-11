<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons_classes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')
                ->references('id')->on('classes')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('lesson_id')->unsigned();
            $table->foreign('lesson_id')
                ->references('id')->on('lessons')
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
        Schema::dropIfExists('lessons_classes');
    }
}
