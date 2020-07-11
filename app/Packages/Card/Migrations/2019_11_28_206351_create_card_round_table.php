<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardRoundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_round', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            //many to many round-card
            $table->unsignedBigInteger('round_id');

            //many to many round-card
            $table->unsignedBigInteger('card_id');

            $table->unique([
                'round_id',
                'card_id'
            ]);

            $table->foreign('round_id')
                ->references('id')->on('rounds')
                ->onDelete('cascade');

            $table->foreign('card_id')
                ->references('id')->on('cards')
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
        Schema::dropIfExists('card_round');
    }
}
