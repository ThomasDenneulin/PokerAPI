<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHandPlayer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hand_player', function (Blueprint $table) {
            $table->unsignedBigInteger('hand_id');
            $table->foreign('hand_id')
                ->references('id')
                ->on('hands')
                ->onDelete('cascade');

            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')
                ->references('id')
                ->on('players')
                ->onDelete('cascade');

            $table->integer('seat');
            $table->double('stack');
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
        Schema::dropIfExists('hand_player');
    }
}
