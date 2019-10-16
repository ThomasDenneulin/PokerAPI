<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRound extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('round', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->primary('id');

            $table->int('card_ID');
            $table->foreign('card_ID')->reference('id')->on('card');

            $table->int('hand_ID');
            $table->foreign('hand_ID')->reference('id')->on('hand');

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
        Schema::dropIfExists('round');
    }
}
