<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Abilities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abilities', function (Blueprint $table) {
            $table->id('id', 16);
            $table->string('ability', 32)->default('Run Away');
            
        });

        $data = [
            ['id'=>NULL, 'ability'=> "Speed Boost"],
            ['id'=>NULL, 'ability'=> "Sturdy"],
            ['id'=>NULL, 'ability'=> "Oblivious"],
            ['id'=>NULL, 'ability'=> "Immunity"],
            ['id'=>NULL, 'ability'=> "Own Tempo"],
            ['id'=>NULL, 'ability'=> "Intimidate"],
            ['id'=>NULL, 'ability'=> "Synchronize"],
            ['id'=>NULL, 'ability'=> "Swift Swim"],
            ['id'=>NULL, 'ability'=> "Inner Focus"],
            ['id'=>NULL, 'ability'=> "Run Away"],
            ['id'=>NULL, 'ability'=> "Keen Eye"],
            ['id'=>NULL, 'ability'=> "Guts"],
            ['id'=>NULL, 'ability'=> "Vital Spirit"],
            ['id'=>NULL, 'ability'=> "Pure Power"],
            ['id'=>NULL, 'ability'=> "SimpleRivalry"],
            ['id'=>NULL, 'ability'=> "Adaptability"],
            ['id'=>NULL, 'ability'=> "Quick Feet"],
            ['id'=>NULL, 'ability'=> "Technician"],
            ['id'=>NULL, 'ability'=> "Acticipation"],
            ['id'=>NULL, 'ability'=> "Scrappy"],
            ['id'=>NULL, 'ability'=> "Reckless"],
            ['id'=>NULL, 'ability'=> "Sheer Force"],
            ['id'=>NULL, 'ability'=> "Unnerve"],
            ['id'=>NULL, 'ability'=> "Overcoat"],
            ['id'=>NULL, 'ability'=> "Regenerator"],
            ['id'=>NULL, 'ability'=> "Analytic"],
            ['id'=>NULL, 'ability'=> "Bulletproof"],
            ['id'=>NULL, 'ability'=> "Stamina"],
            ['id'=>NULL, 'ability'=> "Merciless"]

        ];

        DB::table('abilities')->insert($data);
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
