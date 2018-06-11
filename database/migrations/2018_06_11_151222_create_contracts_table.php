<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('contract_value');
            $table->integer('hour_count');
            $table->integer('price_per');
            $table->string('contact_person');

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')
                ->references('id')->on('admins')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('updated_by')->nullable()->unsigned();
            $table->foreign('updated_by')
                ->references('id')->on('admins')
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
        Schema::dropIfExists('contracts');
    }
}
