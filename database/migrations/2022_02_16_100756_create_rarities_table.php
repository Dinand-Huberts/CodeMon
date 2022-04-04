<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRaritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rarities', function (Blueprint $table) {
            $table->id();
            $table->addColumn('string', 'rarities', ['length' => 300]);
        });
        $data = [
            ['id'=>NULL, 'rarities'=> "common"],
            ['id'=>NULL, 'rarities'=> "uncommon"],
            ['id'=>NULL, 'rarities'=> "rare"],
            ['id'=>NULL, 'rarities'=> "epic"],
            ['id'=>NULL, 'rarities'=> "legendary"],
        ];
        DB::table('rarities')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rarities');
    }
}
