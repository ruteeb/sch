<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('username');
            $table->string('full_name');
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('phone', 20);
            $table->date('birthday');
            $table->text('address');
            $table->string('bsn_number', 50)->nullable();
            $table->string('post_code', 50)->nullable();
            $table->string('home_number', 50)->nullable();
            $table->string('extension', 100)->nullable();
            $table->string('street_name')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->date('start_borrow')->nullable();
            $table->date('end_borrow')->nullable();
            $table->date('start_residence')->nullable();
            $table->date('end_residence')->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->enum('level', ['student', 'teacher']);
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
        Schema::dropIfExists('users');
    }
}
