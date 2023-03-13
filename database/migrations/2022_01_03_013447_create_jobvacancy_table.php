<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobvacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobvacancy', function (Blueprint $table) {
            $table->bigIncrements('jobVacancyID');
            $table->bigInteger('msmeID')->unsigned();
            $table->foreign('msmeID')->references('msmeID')->on('msme');
            $table->bigInteger('jobID')->unsigned();
            $table->foreign('jobID')->references('jobID')->on('job');
            $table->string('duration');
            $table->text('description');
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
        Schema::dropIfExists('jobvacancy');
    }
}
