<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jobseeker_id')->unsigned();
            $table->text('education')->nullable();
            $table->text('training')->nullable();
            $table->mediumText('experience')->nullable();
            $table->text('language')->nullable();
            $table->text('social_links')->nullable();
            $table->text('cv_path');
            $table->timestamps();

            $table->foreign('jobseeker_id')->references('id')->on('jobseekers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}
