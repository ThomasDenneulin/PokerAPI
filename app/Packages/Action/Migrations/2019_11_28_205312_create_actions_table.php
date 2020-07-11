<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            //many to one
            $table->unsignedBigInteger('player_id')
                ->nullable();

            //many to one
            $table->unsignedBigInteger('round_id');

            $table->integer('type');

            $table->string('value')
                ->nullable();

            $table->foreign('player_id')
                ->references('id')->on('players');

            $table->foreign('round_id')
                ->references('id')->on('rounds')
                ->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
