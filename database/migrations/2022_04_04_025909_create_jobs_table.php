<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();       
            $table->bigInteger('employer_id')->unsigned();       
            // $table->bigInteger('skill_id')->unsigned();  
            $table->bigInteger('location_id')->unsigned();       
            $table->bigInteger('industry_id')->unsigned();       
            $table->string('title');
            $table->string('application_email')->nullable();
            $table->string('application_url')->nullable();
            $table->enum('job_type', ['Fulltime', 'Parttime', 'Internship', 'Others'])->default('Fulltime');
            $table->text('description')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('requirement')->nullable();
            $table->text('experience')->nullable();
            $table->bigInteger('min_salary')->unsigned();
            $table->bigInteger('max_salary')->unsigned();
            $table->enum('status', ['Active', 'Pending', 'Rejected', 'Expired'])->default('Pending');
            $table->boolean('featured')->default(0);

            $table->date('last_date');
            $table->integer('views')->unsigned()->default(0);
            $table->integer('openings')->unsigned();
            $table->string('slug');
            $table->timestamps();

            $table->foreign('employer_id', 'emp_id_fk')->references('id')->on('employers');
            // $table->foreign('skill_id', 'skill_id_fk')->references('id')->on('skills');
            
            $table->foreign('location_id', 'location_id_fk')->references('id')->on('locations');
            $table->foreign('industry_id', 'industry_id_fk')->references('id')->on('industries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
