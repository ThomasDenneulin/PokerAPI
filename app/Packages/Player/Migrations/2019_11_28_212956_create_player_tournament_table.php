<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_tournament', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            //many to many hands-players
            $table->unsignedBigInteger('player_id');

            //many to many hands-players
            $table->unsignedBigInteger('tournament_id');

            $table->integer('rank');

            $table->double('won');

            $table->string('result')
                ->nullable();

            $table->unique([
                'player_id',
                'tournament_id'
            ]);

            $table->foreign('player_id')
                ->references('id')->on('players')
                ->onDelete('cascade');

            $table->foreign('tournament_id')
                ->references('id')->on('tournaments')
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
        Schema::dropIfExists('player_tournament');
    }
}
