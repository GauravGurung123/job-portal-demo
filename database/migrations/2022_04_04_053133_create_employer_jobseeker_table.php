<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerJobseekerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_jobseeker', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employer_id')->unsigned()->nullable();
            $table->bigInteger('jobseeker_id')->unsigned()->nullable();
            $table->bigInteger('skill_id')->unsigned()->nullable();

            $table->foreign('employer_id')->references('id')->on('employers');
            $table->foreign('jobseeker_id')->references('id')->on('jobseekers');
            $table->foreign('skill_id')->references('id')->on('skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employer_jobseeker');
    }
}
