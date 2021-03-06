<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id('id', 16);
            
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('teacher_id')->references('id')->on('teachers');

            $table->foreignId('ability')->references('id')->on('abilities');
            $table->foreignId('hidden_ability')->references('id')->on('abilities');


            $table->foreignId('card_rarity')->references('id')->on('rarities');
            $table->addColumn('integer', 'card_hp', ['length' => 4]);
            $table->addColumn('integer', 'card_attack', ['length' => 4]);
            $table->addColumn('integer', 'card_defense', ['length' => 4]);            
            $table->addColumn('integer', 'card_special_attack', ['length' => 4]);
            $table->addColumn('integer', 'card_special_defense', ['length' => 4]);
            $table->addColumn('integer', 'card_speed', ['length' => 4]);
           
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
