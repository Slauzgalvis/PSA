<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from')->unsigned();
            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
            $table->integer('to')->unsigned();
            $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
            $table->text('message');
            $table->tinyInteger('is_red')->default(0);
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
        Schema::dropIfExists('messages');
    }
}
