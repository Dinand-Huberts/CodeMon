<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id('id', 12);
            $table->longText('quiz_question');
            $table->longText('quiz_answer');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('quiz_difficulty');
            $table->foreign('quiz_difficulty')->references('id')->on('box_difficulties');
            $table->unsignedBigInteger('quiz_type');
            $table->foreign('quiz_type')->references('id')->on('quiz_type');
        });
        $data = [
            ['id'=>NULL, 'quiz_question'=> "testvraag [blank] testvraag" , 'quiz_answer'=> "test" , 'category_id'=> "1" , 'quiz_difficulty'=> "1" , 'quiz_type'=> "1"],
        ];
        DB::table('quizzes')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
