<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->primary('id');

            $table->int('player_ID');
            $table->foreign('player_ID')->reference('id')->on('player');

            $table->int('round_ID');
            $table->foreign('round_ID')->reference('id')->on('round');

            $table->int('type');
            $table->string('value');
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
        Schema::dropIfExists('action');
    }
}
