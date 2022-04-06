<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('industry_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table->string('username')->unique();
            $table->string('org_name');
            $table->text('content')->nullable();
            $table->string('slug');
            $table->string('phone_no')->nullable();
            $table->string('website')->nullable();
            $table->enum('status', ['Active', 'Blocked'])->default('Active');
            $table->text('social_links')->nullable();
            $table->text('profile_photo_path');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('token')->unique();
            $table->dateTime('token_expiry');
            $table->dateTime('last_logged_in')->nullable();
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('industry_id')->references('id')->on('industries');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employers');
    }
}
