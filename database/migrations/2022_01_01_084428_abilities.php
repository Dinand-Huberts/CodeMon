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
            $table->string('abilities', 32)->default('Run Away');
            
        });

        $data = [
            ['id'=>NULL, 'abilities'=> "Speed Boost"],
            ['id'=>NULL, 'abilities'=> "Sturdy"],
            ['id'=>NULL, 'abilities'=> "Oblivious"],
            ['id'=>NULL, 'abilities'=> "Immunity"],
            ['id'=>NULL, 'abilities'=> "Own Tempo"],
            ['id'=>NULL, 'abilities'=> "Intimidate"],
            ['id'=>NULL, 'abilities'=> "Synchronize"],
            ['id'=>NULL, 'abilities'=> "Swift Swim"],
            ['id'=>NULL, 'abilities'=> "Inner Focus"],
            ['id'=>NULL, 'abilities'=> "Run Away"],
            ['id'=>NULL, 'abilities'=> "Keen Eye"],
            ['id'=>NULL, 'abilities'=> "Guts"],
            ['id'=>NULL, 'abilities'=> "Vital Spirit"],
            ['id'=>NULL, 'abilities'=> "Pure Power"],
            ['id'=>NULL, 'abilities'=> "SimpleRivalry"],
            ['id'=>NULL, 'abilities'=> "Adaptabilities"],
            ['id'=>NULL, 'abilities'=> "Quick Feet"],
            ['id'=>NULL, 'abilities'=> "Technician"],
            ['id'=>NULL, 'abilities'=> "Acticipation"],
            ['id'=>NULL, 'abilities'=> "Scrappy"],
            ['id'=>NULL, 'abilities'=> "Reckless"],
            ['id'=>NULL, 'abilities'=> "Sheer Force"],
            ['id'=>NULL, 'abilities'=> "Unnerve"],
            ['id'=>NULL, 'abilities'=> "Overcoat"],
            ['id'=>NULL, 'abilities'=> "Regenerator"],
            ['id'=>NULL, 'abilities'=> "Analytic"],
            ['id'=>NULL, 'abilities'=> "Bulletproof"],
            ['id'=>NULL, 'abilities'=> "Stamina"],
            ['id'=>NULL, 'abilities'=> "Merciless"]

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
