<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardPlayer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_player', function (Blueprint $table) {
            $table->int('card_ID');
            $table->foreign('card_ID')->reference('id')->on('card');

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
        Schema::dropIfExists('card_player');
    }
}
