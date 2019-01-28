<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vacancy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()


    {
        Schema::create('vacancy', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->string('vacancy_type');
            $table->string('description');
            $table->string('no_of_position');
            $table->string('industry');
            $table->string('job_city');
            $table->string('job_type');
            $table->string('job_shift');
            $table->string('degree_level');
            $table->string('carrier_level');
            $table->string('skills_required');
            $table->string('salary');
            $table->string('experience');
            $table->string('age_range');
            $table->string('working_hours');
            $table->string('last_date');

            $table->unsignedInteger('hr_id');

            $table->foreign('hr_id')->references('id')->on('hrpolicy');
            $table->string('hr_no_of_interview');
            $table->string('hr_procedure');

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
        Schema::dropIfExists('vacancy');
    }
}
