<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBoxDifficultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_difficulties', function (Blueprint $table) {
            $table->id();
            $table->addColumn('string', 'difficulty', ['length' => 300]);
        });
        $data = [
            ['id'=>NULL, 'difficulty'=> "easy"],
            ['id'=>NULL, 'difficulty'=> "normal"],
            ['id'=>NULL, 'difficulty'=> "hard"],
            ['id'=>NULL, 'difficulty'=> "extreme"],
            ['id'=>NULL, 'difficulty'=> "nightmare"],
        ];
        DB::table('box_difficulties')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('box_difficulties');
    }
}
