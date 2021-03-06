<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('username')->unique();
         
            $table->text('profile_photo_path')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('token')->unique()->nullable();
            $table->dateTime('token_expiry')->nullable();
            $table->timestamp('last_logged_in')->nullable();
            $table->enum('status', ['Active', 'Blocked'])->default('Active');
        
            $table->timestamps();

            // $table->index(['name','username','email'], $name='fulltext_index_for_admins');
        });
        DB::statement('ALTER TABLE admins ADD FULLTEXT fulltext_index_for_admins(name,username,email)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
