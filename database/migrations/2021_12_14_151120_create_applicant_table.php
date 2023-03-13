<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant', function (Blueprint $table) {
            $table->bigIncrements('applicantID');
            $table->bigInteger('userID')->unsigned();
            $table->foreign('userID')->references('userID')->on('user');
            $table->string('applicantName');
            $table->string('applicantAddress');
            $table->string('applicantDOB');
            $table->text('CV')->nullable();
            $table->string('portofolioLink')->nullable();
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
        Schema::dropIfExists('applicant');
    }
}
