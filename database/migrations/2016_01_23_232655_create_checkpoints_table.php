<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkpoints', function (Blueprint $table) {

            // primary key
            $table->increments('id');

            // foreign key
            $table->integer('event_id')->unsigned();

            // other fields
            $table->string('title');
            $table->string('artist');
            $table->string('description');
            $table->string('image_src');
            $table->float('lat');
            $table->float('lon');
            $table->string('qr');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::table('checkpoints', function($table) {
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
        Schema::drop('checkpoints');
    }
}
