<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('winamax_id')
                ->nullable()
                ->unique();

            $table->datetime('date');

            $table->string('game_type');

            $table->boolean('is_real_money')
                ->default(true);

            //relation many to one with tournament if exists.
            $table->unsignedBigInteger('tournament_id')
                ->nullable();

            $table->foreign('tournament_id')
                ->references('id')->on('tournaments')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hands');
    }
}
