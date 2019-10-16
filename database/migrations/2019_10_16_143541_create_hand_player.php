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
            $table->int('hand_ID');
            $table->foreign('hand_ID')->reference('id')->on('hand');

            $table->int('player_ID');
            $table->foreign('player_ID')->reference('id')->on('player');
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
