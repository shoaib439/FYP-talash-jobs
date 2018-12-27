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


      Schema::create('companyprofiles', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->string('company_name');
          $table->string('type');
          $table->string('address');
          $table->string('website');
          $table->string('cnic');
          $table->string('person_name');
          $table->string('person_designation');
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
