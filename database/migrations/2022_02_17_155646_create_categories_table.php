<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id', 5);
            $table->string('category_name', 32);
        });
        $data = [
            ['id'=>NULL, 'category_name'=> "Fill in the blanks"],
            ['id'=>NULL, 'category_name'=> "Multiple choice"],
            ['id'=>NULL, 'category_name'=> "True/false"],
            ['id'=>NULL, 'category_name'=> "Matching"],
            ['id'=>NULL, 'category_name'=> "Code"],
        ];
        DB::table('categories')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
