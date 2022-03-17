<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->addColumn('string', 'name', ['length' => 100]);
            $table->addColumn('string', 'img', ['length' => 100])->default('./img/card-images/not-found.png');
            


        });
        $data = [
            ['id'=>NULL, 'name'=> "Thomas", 'img'=> "./img/card-images/1.png"],
            ['id'=>NULL, 'name'=> "Jos", 'img'=> "./img/card-images/2.png"],
            ['id'=>NULL, 'name'=> "Wijnand", 'img'=> "./img/card-images/3.png"],
            ['id'=>NULL, 'name'=> "Gerben", 'img'=> "./img/card-images/4.png"],
            ['id'=>NULL, 'name'=> "Sinnika", 'img'=> "./img/card-images/5.png"],
            ['id'=>NULL, 'name'=> "Ton", 'img'=> "./img/card-images/6.png"],
            ['id'=>NULL, 'name'=> "Pim", 'img'=> "./img/card-images/7.png"]
          
        ];
        DB::table('teachers')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
