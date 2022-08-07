<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->text('about_you')->nullable();
            $table->date('date_of_birth');
            $table->string('address');
            $table->integer('gender_id');
            $table->integer('marital_status_id');
            $table->string('phone');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->string('profession');
            $table->string('admission_number')->nullable();
            $table->string('jss_class');
            $table->string('sss_class');
            $table->integer('house_id');
            $table->date('year_of_entry');
            $table->year('graduation_year_id');
            $table->string('workplace')->nullable();
            $table->string('university')->nullable();
            $table->string('course_of_study')->nullable();
            $table->string('potrait_image')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
}
