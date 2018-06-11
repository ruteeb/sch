<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresenceStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presence_students', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lesson_id')->unsigned();
            $table->foreign('lesson_id')
                ->references('id')->on('lessons')
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
        Schema::dropIfExists('presence_students');
    }
}
