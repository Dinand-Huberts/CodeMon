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
            //Easy (EZ)
            ['id'=>NULL, 'quiz_question'=> "Maak een footer aan.<br><br><[blank]>" , 'quiz_answer'=> "footer" , 'category_id'=> "1" , 'quiz_difficulty'=> "1" , 'quiz_type'=> "1"],
            ['id'=>NULL, 'quiz_question'=> "Sluit deze span-tag af.<br><br><span><br><br><[blank]>" , 'quiz_answer'=> "/span" , 'category_id'=> "1" , 'quiz_difficulty'=> "1" , 'quiz_type'=> "1"],
            //Medium (MM)
            ['id'=>NULL, 'quiz_question'=> "Maak de CSS-code af. De tekst moet rood worden. Gebruik GEEN spaties!<br><br>span {<br>^s^s[blank]<br>}" , 'quiz_answer'=> "color:red;" , 'category_id'=> "1" , 'quiz_difficulty'=> "2" , 'quiz_type'=> "2"],
            ['id'=>NULL, 'quiz_question'=> "Maak de image tag af. De foto heet 'kaas.png', en zit in de map 'eten'. Maak gebruik van single quotes ('), en forward slashes (/).<br><br><img src=[blank]>" , 'quiz_answer'=> "'eten/kaas.png'" , 'category_id'=> "1" , 'quiz_difficulty'=> "2" , 'quiz_type'=> "1"],
            //Hard (HD)
            ['id'=>NULL, 'quiz_question'=> "Stel, je wilt in je SQL-database alle rijen laten zien uit tabel 'users'. Schrijf de SQL-query op Gebruik hoofdletters bij de clauses! Je hoeft de query niet af te sluiten.<br><br>[blank]" , 'quiz_answer'=> "SELECT * FROM users" , 'category_id'=> "1" , 'quiz_difficulty'=> "3" , 'quiz_type'=> "4"],
            ['id'=>NULL, 'quiz_question'=> "Schrijf de hele meta tag om de tekenset UTF-8 te gebruiken.<br><br><html><br>^s^s<head><br>^s^s^s^s[blank]<br>^s^s</head><br></html>" , 'quiz_answer'=> "test" , 'category_id'=> "1" , 'quiz_difficulty'=> "3" , 'quiz_type'=> "1"],
            //Extreme (EX)
            ['id'=>NULL, 'quiz_question'=> "Maak een SQL query die ALLEEN de 'name' van de 'users' tabel selecteert met een 'admin' waarde van 0, en een 'verified' waarde van 1, in deze volgorde. Gebruik hoofdletters bij de clauses en gebruik single quotes bij de variabelen. Sluit de query af!<br><br>[blank]" , 'quiz_answer'=> "SELECT name FROM users WHERE admin='0' AND verified='1';" , 'category_id'=> "1" , 'quiz_difficulty'=> "4" , 'quiz_type'=> "4"],
            ['id'=>NULL, 'quiz_question'=> "Vul de htmlspecialchars-functie aan. Zorg ervoor dat hij ook kijkt naar beide soorten quotes, en dat de codering in UTF-8 is uitgevoerd. Let op, single quotes!<br><br>htmlspecialchars(^dfoo, [blank]);" , 'quiz_answer'=> ", ENT_QUOTES, 'UTF-8'" , 'category_id'=> "1" , 'quiz_difficulty'=> "4" , 'quiz_type'=> "1"],
            //NIGHTMARE (NM)
            ['id'=>NULL, 'quiz_question'=> "Vraag<br><br>[blank]" , 'quiz_answer'=> "Antwoord" , 'category_id'=> "1" , 'quiz_difficulty'=> "5" , 'quiz_type'=> "1"],
            ['id'=>NULL, 'quiz_question'=> "Hoeveel kans op een Common kaart heb je met een loot box level van 7?<br><br>[blank]" , 'quiz_answer'=> "0" , 'category_id'=> "1" , 'quiz_difficulty'=> "5" , 'quiz_type'=> "6"],
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
