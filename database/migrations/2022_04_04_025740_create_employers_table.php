<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            
            $table->string('phone_no')->nullable();
            $table->string('website')->nullable();
            $table->enum('status', ['Active', 'Blocked'])->default('Active');
            $table->text('social_links')->nullable();
            $table->text('profile_photo_path');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('token')->unique()->nullable();
            $table->dateTime('token_expiry')->nullable();
            $table->timestamp('last_logged_in')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // $table->index(['username','org_name','email'], $name='fulltext_index_for_employers');

            $table->foreign('industry_id')->references('id')->on('industries');
            $table->foreign('location_id')->references('id')->on('locations');
        });
        
DB::statement('ALTER TABLE employers ADD FULLTEXT fulltext_index_for_employers(username,org_name,email)');
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
