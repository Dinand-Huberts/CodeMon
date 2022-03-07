<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Facade\FlareClient\View;
use Illuminate\View\Component;


class quiz extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        //get and set user_id
        $user_id = Auth::id();

        //cooldown check
        $cooldown_query = DB::table('users')->where('id', '=', $user_id)->get();
        $cooldown_string = $cooldown_query[0]->quiz_cooldown;
        $cooldown = strtotime($cooldown_string);
        $time = time();
        $interval = $time - $cooldown;
        if ($interval >= 14400) { 
            $quiz_cooldown_check = true;
        } else {
            $quiz_cooldown_check = false;
        }


        //set max amount of quizzes available
        $max_id_query = DB::table('quizzes')->where('id', \DB::raw("(select max(`id`) from quizzes)"))->get();
        $max_id = $max_id_query[0]->id;

        
        $quiz_id = rand(1, $max_id);


         //retrieve the questions and answer
        $quiz_query = DB::table('quizzes')->where('id', '=', $quiz_id)->get();
        $quiz_question = $quiz_query[0]->quiz_question;
        $quiz_answer = $quiz_query[0]->quiz_answer;
        $quiz_category = $quiz_query[0]->category_id;
        $quiz_difficulty = $quiz_query[0]->quiz_difficulty;
        $quiz_type = $quiz_query[0]->quiz_type;
 
        //set variables in the view
        $data = 
        ['quiz_answer' => $quiz_answer,
        'quiz_question' => $quiz_question,
        'quiz_category' => $quiz_category,
        'quiz_difficulty' => $quiz_difficulty,
        'quiz_type' => $quiz_type,
        'quiz_id' => $quiz_id,
        'quiz_cooldown' => $quiz_cooldown_check
    ];

        return view('/components/quiz', $data);
    }
}

