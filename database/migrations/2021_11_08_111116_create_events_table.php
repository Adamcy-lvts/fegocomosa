<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->UnsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->string('slug');
            $table->time('event_time');
            $table->date('event_date');
            $table->string('event_venue');
            $table->string('speaker')->nullable();
            $table->string('organizer')->nullable();
            $table->string('image')->nullable();
            $table->mediumText('body')->nullable();
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
        Schema::dropIfExists('events');
    }
}
