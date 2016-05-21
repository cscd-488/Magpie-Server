<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {

            // primary key
            $table->increments('id');

            // other fields
            $table->string('title');
            $table->string('short_title');
            $table->string('author');
            $table->string('description');
            $table->string('image_src');
            $table->float('lat');
            $table->float('lon');
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
        Schema::drop('events');
    }
}
