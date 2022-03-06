<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateQuizType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_type', function (Blueprint $table) {
            $table->id('id', 2);
            $table->longText('quiz_type');
        });
        $data = [
            ['id'=>NULL, 'quiz_type'=> "HTML"],
            ['id'=>NULL, 'quiz_type'=> "CSS"],
            ['id'=>NULL, 'quiz_type'=> "Javascript"],
            ['id'=>NULL, 'quiz_type'=> "SQL"],
            ['id'=>NULL, 'quiz_type'=> "PHP"],
            ['id'=>NULL, 'quiz_type'=> "Mixed"],
        ];
        DB::table('quiz_type')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_type');
    }
}
