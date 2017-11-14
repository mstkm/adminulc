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
            $table->string('name');
            $table->string('username')->unique();           
            $table->string('email')->unique();
            $table->string('password');
            $table->date('birthdate');
            $table->string('admin');
            $table->string('status')->default('blocked');
            $table->string('photo')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
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
