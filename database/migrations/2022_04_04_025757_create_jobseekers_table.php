<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobseekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseekers', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('username')->unique();
            $table->text('content')->nullable();
            $table->string('slug');
            $table->string('phone_no')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('website')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->enum('status', ['Active', 'Blocked'])->default('Active');
            $table->text('social_links')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('token')->unique();
            $table->dateTime('token_expiry');
            $table->dateTime('last_logged_in')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('jobseekers');
    }
}
