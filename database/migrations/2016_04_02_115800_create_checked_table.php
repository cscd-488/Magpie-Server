<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checked', function (Blueprint $table) {

            // primary key
            $table->increments('id');

            // foreign key
            $table->integer('user_id')->unsigned();
            $table->integer('checkpoint_id')->unsigned();

        });

        Schema::table('checked', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('checkpoint_id')->references('id')->on('checkpoints');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('checked');
    }
}