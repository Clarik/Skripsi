<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal', function (Blueprint $table) {
            $table->bigIncrements('proposalID');
            $table->bigInteger('userID')->unsigned();
            $table->foreign('userID')->references('userID')->on('user');
            $table->bigInteger('jobVacancyID')->unsigned();
            $table->foreign('jobVacancyID')->references('jobVacancyID')->on('jobvacancy');
            $table->boolean('isHired');
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
        Schema::dropIfExists('proposal');
    }
}
