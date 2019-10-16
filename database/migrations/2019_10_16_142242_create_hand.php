<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('hands')){
            Schema::create('hand', function (Blueprint $table) {
                $table->increment('id');    
                $table->datetime('date');
                $table->string('gameType');
                $table->boolean('isRealMoney');
                $table->primary('id');
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
        Schema::dropIfExists('hand');
    }
}
