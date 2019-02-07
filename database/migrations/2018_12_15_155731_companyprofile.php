<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Companyprofile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::enableForeignKeyConstraints();
      Schema::create('companyprofiles', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');

          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->string('company_name');
          $table->string('company_type')->nullable();
          $table->string('address');
          $table->string('website');
          $table->string('cnic');
          $table->string('person_name');
          $table->string('skype')->nullable();
          $table->string('person_designation');
          $table->string('company_lat')->nullable();
          $table->string('company_lng')->nullable();
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
        Schema::dropIfExists('companyprofile');
    }
}
