<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRarityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rarity', function (Blueprint $table) {
            $table->id();
            $table->addColumn('string', 'rarity', ['length' => 300]);
        });
        $data = [
            ['id'=>NULL, 'rarity'=> "legendary"],
            ['id'=>NULL, 'rarity'=> "epic"],
            ['id'=>NULL, 'rarity'=> "rare"],
            ['id'=>NULL, 'rarity'=> "uncommon"],
            ['id'=>NULL, 'rarity'=> "common"],
        ];
        DB::table('rarity')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rarity');
    }
}
