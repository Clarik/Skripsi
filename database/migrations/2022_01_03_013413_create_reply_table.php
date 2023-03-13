<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply', function (Blueprint $table) {
            $table->bigIncrements('replyID');
            $table->bigInteger('threadID')->unsigned();;
            $table->foreign('threadID')->references('threadID')->on('thread');
            $table->bigInteger('userID')->unsigned();
            $table->foreign('userID')->references('userID')->on('user');
            $table->text('replyContent');
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
        Schema::dropIfExists('reply');
    }
}
