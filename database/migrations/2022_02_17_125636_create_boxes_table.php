<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->id('id', 16);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('box_difficulty');
            $table->foreign('box_difficulty')->references('id')->on('box_difficulties');
            $table->boolean('box_activated');
        });
        $data = [
            ['id'=>NULL, 'user_id'=>'1', 'box_difficulty'=>'1', 'box_activated'=> "1"],
            ['id'=>NULL, 'user_id'=>'1', 'box_difficulty'=>'3', 'box_activated'=> "0"],
            ['id'=>NULL, 'user_id'=>'1', 'box_difficulty'=>'2', 'box_activated'=> "0"],
            ['id'=>NULL, 'user_id'=>'1', 'box_difficulty'=>'5', 'box_activated'=> "0"],
        ];
        DB::table('boxes')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boxes');
    }
}
