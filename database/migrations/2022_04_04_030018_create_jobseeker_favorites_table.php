<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobseekerFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker_favorites', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jobseeker_id')->unsigned();
            $table->bigInteger('job_id')->unsigned();
            $table->timestamps();

            $table->foreign('jobseeker_id')->references('id')->on('jobseekers');
            $table->foreign('job_id')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobseeker_favorites');
    }
}
