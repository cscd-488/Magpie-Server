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
            $table->string('event_id');

            // relations
            $table->foreign('event_id')->references('id')->on('events');


            // other fields
            $table->string('title');
            $table->string('artist');
            $table->string('description');
            $table->string('image_src');
            $table->string('lat');
            $table->string('lon');
            $table->string('qr');
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
        Schema::drop('checkpoints');
    }
}
