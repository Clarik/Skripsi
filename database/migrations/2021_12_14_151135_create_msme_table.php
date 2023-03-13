<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsmeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msme', function (Blueprint $table) {
            
            $table->bigIncrements('msmeID');
            $table->bigInteger('userID')->unsigned();
            $table->foreign('userID')->references('userID')->on('user');
            $table->string('msmeName');
            $table->string('msmeAddress');
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
        Schema::dropIfExists('msme');
    }
}
