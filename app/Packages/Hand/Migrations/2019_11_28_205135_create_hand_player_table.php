<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHandPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hand_player', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            //many to many hands-players
            $table->unsignedBigInteger('hand_id');

            //many to many hands-players
            $table->unsignedBigInteger('player_id');

            $table->integer('seat');

            $table->double('start_stack');

            $table->double('end_stack');

            $table->string('result')
                ->nullable();

            $table->foreign('hand_id')
                ->references('id')->on('hands')
                ->onDelete('cascade');

            $table->foreign('player_id')
                ->references('id')->on('players')
                ->onDelete('cascade');
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
