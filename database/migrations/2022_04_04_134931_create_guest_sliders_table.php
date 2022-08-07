<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('banner_id')->nullable();
            // $table->string('slider_banner_id')->nullable();
            $table->string('caption')->nullable();
            $table->string('link1')->nullable();
            $table->string('link2')->nullable();
            // $table->string('for_banner')->nullable();
            // $table->string('progress_menu');
            // $table->string('logo')->nullable();
            $table->text('info')->nullable();
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
        Schema::dropIfExists('guest_sliders');
    }
}
