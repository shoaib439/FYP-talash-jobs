<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('jobseeker_id');
            $table->foreign('jobseeker_id')->references('id')->on('users');

            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('users');

            $table->unsignedInteger('vacancy_id');
            $table->foreign('vacancy_id')->references('id')->on('vacancy');

            $table->string("invite_accept");
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
        Schema::dropIfExists('invites');
    }
}
