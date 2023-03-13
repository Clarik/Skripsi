<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification', function (Blueprint $table) {
            $table->bigIncrements('certificationID');
            $table->bigInteger('userID')->unsigned();
            $table->foreign('userID')->references('userID')->on('user');
            $table->string('certificationName');
            $table->string('provider');
            $table->text('description');
            $table->date('datePublished');
            $table->string('certificationLink');
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
        Schema::dropIfExists('certification');
    }
}
