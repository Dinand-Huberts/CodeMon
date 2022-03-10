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
        });
        $data = [
            ['id'=>NULL, 'name'=> "Thomas"],
            ['id'=>NULL, 'name'=> "Jos"],
            ['id'=>NULL, 'name'=> "Wijnand"],
            ['id'=>NULL, 'name'=> "Gerben"],
            ['id'=>NULL, 'name'=> "Sinnika"],
            ['id'=>NULL, 'name'=> "Ton"],
            ['id'=>NULL, 'name'=> "Pim"],
            ['id'=>NULL, 'name'=> "Sinnika"],
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
