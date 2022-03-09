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
        session_start();

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

        //retrieve the questions and answer for the difficulty chosen.
        switch ($_GET['difficulty']) {
            case 'easy':
                $difficulty = 1;
                break;

            case 'normal':
                $difficulty = 2;
                break;

            case 'hard':
                $difficulty = 3;
                break;

            case 'extreme':
                $difficulty = 4;
                break;

            case 'nightmare':
                $difficulty = 5;
                break;
        }   
        // Fetches everything with the assigned difficulty from the quizzes table
        $quizzes = DB::table('quizzes')->where('quiz_difficulty', '=', $difficulty)->get();

        // Further idiotproofing
        $quizzes_count = count($quizzes);
        $quizzes_int = rand(0, ($quizzes_count - 1));

        if (isset($quizzes[$quizzes_int])) {
            $quiz_id = $quizzes[$quizzes_int]->id;
            $quiz_question = $quizzes[$quizzes_int]->quiz_question;
            $quiz_answer = $quizzes[$quizzes_int]->quiz_answer;
            $quiz_type = $quizzes[$quizzes_int]->quiz_type;
        }
        

        //Assign quiz_id to session
        $_SESSION['quiz_id'] = $quiz_id;

        //Set variables in the view
        $data =
            [   
                'quiz_id' => $quiz_id,  
                'quizzes_int' => $quizzes_count,
                'quiz_question' => $quiz_question,
                'quiz_answer' => $quiz_answer,
                'quiz_type' => $quiz_type,
                'quiz_cooldown' => $quiz_cooldown_check
            ];
        return view('/components/quiz', $data);
    }
}
