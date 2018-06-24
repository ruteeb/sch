<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('value');

            $table->integer('contract_id')->unsigned();
            $table->foreign('contract_id')
                ->references('id')->on('contracts')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')
                ->references('id')->on('admins')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('invoices');
    }
}
