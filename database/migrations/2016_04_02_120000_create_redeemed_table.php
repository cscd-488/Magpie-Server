<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedeemedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeemed', function (Blueprint $table) {

            // primary key
            $table->increments('id');

            // foreign key
            $table->integer('user_id')->unsigned();
            $table->integer('event_id')->unsigned();

            // other fields
            $table->string('redeemed');

        });

        Schema::table('redeemed', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('redeemed');
    }
}