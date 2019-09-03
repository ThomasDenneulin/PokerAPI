<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('players')){
            Schema::create('players', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('seat');

                $table->unsignedInteger('hands_id');
                $table->foreign('hands_id')
                ->references('id')->on('hands');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
