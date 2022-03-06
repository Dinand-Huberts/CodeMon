<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id', 12);
            $table->string('email', 64);
            $table->longText('password');
            $table->string('name', 32);
            $table->boolean('admin')->default(0);
            $table->timestamp('quiz_cooldown')->default('2022-01-01 01:01:01');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
        $data = [
            ['id'=>NULL, 'email'=>'joe@joe.joe',  'password'=>'$2y$10$DsdOiDm72vdiz02C3XTZW.wS4/orKq.xnx6XDAyQEJtdcTN8meTpe', 'name'=>'joe_the_destroyer', 'admin'=>'0', 'quiz_cooldown'=> "2022-01-01 01:01:01", 'created_at'=>"2022-01-01 01:01:01", 'updated_at'=>"2022-01-01 01:01:01",],
            ['id'=>NULL, 'email'=>'mail@gmail.com',  'password'=>'$2y$10$DsdOiDm72vdiz02C3XTZW.wS4/orKq.xnx6XDAyQEJtdcTN8meTpe', 'name'=>'test', 'admin'=>'1', 'quiz_cooldown'=> "2022-01-01 01:01:01", 'created_at'=>"2022-01-01 01:01:01", 'updated_at'=>"2022-01-01 01:01:01",],
            ['id'=>NULL, 'email'=>'aaaaaaaaaaaaaaaaaaaaaaaaaaa@aaaaaaaa.com',  'password'=>'$2y$10$DsdOiDm72vdiz02C3XTZW.wS4/orKq.xnx6XDAyQEJtdcTN8meTpe', 'name'=>'aaaaaaaaa', 'admin'=>'0', 'quiz_cooldown'=> "2022-01-01 01:01:01", 'created_at'=>"2022-01-01 01:01:01", 'updated_at'=>"2022-01-01 01:01:01",],
            ['id'=>NULL, 'email'=>'google@gmail.com',  'password'=>'$2y$10$DsdOiDm72vdiz02C3XTZW.wS4/orKq.xnx6XDAyQEJtdcTN8meTpe', 'name'=>'Google', 'admin'=>'0', 'quiz_cooldown'=> "2022-01-01 01:01:01", 'created_at'=>"2022-01-01 01:01:01", 'updated_at'=>"2022-01-01 01:01:01",],
        ];
        DB::table('users')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
