<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardTable extends Migration
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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->addColumn('integer', 'card_rarity', ['length' => 4]);
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers');
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
        Schema::dropIfExists('card');
    }
}
