<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('advice')->nullable();;
            $table->integer('grade')->nullable();
            $table->integer('nota_id')->unsigned();
            $table->foreign('nota_id')->references('id')->on('notas')->onDelete('cascade');             
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('periode_id')->unsigned();
            $table->foreign('periode_id')->references('id')->on('periodes')->onDelete('cascade'); 
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
        Schema::drop('reports');
    }
}
