<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jobseeker_id')->unsigned();
            $table->bigInteger('job_id')->unsigned();
            $table->text('cv_path');
            $table->enum('status', ['Pending', 'Shortlisted', 'Rejected', 'Blocked'])->default('Pending');
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
        Schema::dropIfExists('job_applications');
    }
}
