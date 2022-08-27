<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('user_id');
            $table->integer('category_post_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->mediumText('body');
            $table->string('image')->nullable();
            $table->boolean('active')->default(1);
            $table->bigInteger('reads')->unsigned()->default(0)->index();
            $table->boolean('featured')->default(0)->nullable();
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
        Schema::dropIfExists('posts');
    }
}
