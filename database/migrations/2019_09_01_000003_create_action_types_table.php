<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->timestamps();

            $table->unsignedInteger('players_id');
            $table->foreign('players_id')
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
        Schema::dropIfExists('action_types');
    }
}
