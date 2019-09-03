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
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value');

            //One to many de Round vers Action
            $table->unsignedInteger('rounds_id');
            $table->foreign('rounds_id')
            ->references('id')->on('rounds');

            //Many to one de Action vers Action type
            $table->unsignedInteger('action_types_id');
            $table->foreign('action_types_id')
            ->references('id')->on('action_types');


            //Many to one de Action vers Players
            $table->unsignedInteger('players_id');
            $table->foreign('players_id')
            ->references('id')->on('players');

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
        Schema::dropIfExists('actions');
    }
}
