<?php

use App\Models\Organizer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('campaign_title');
            $table->string('slug');
            $table->text('description');
            $table->mediumText('about')->nullable();
            $table->integer('goal');
            $table->date('starting_date');
            $table->string('cover_image')->nullable();
            $table->string('caption')->nullable();
            $table->foreignIdFor(Organizer::class);
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
        Schema::dropIfExists('campaigns');
    }
}
