<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        session_start();

        //TODO: Move this over to an include, maybe?
        //This piece of code defines what tags are allowed, and what they convert to.
        //KEEP IN MIND, THAT AN ERROR OCCURS IF ONLY ONE OF THE TWO ARRAYS EXIST.
        $tags_allowed = [
            "&lt;br&gt;",
            "^s",
            "^d"
        ];
        $tags_converted = [
            "<br>",
            "&nbsp;",
            "$"
        ];

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

            /// Uses quiz_question and uses arbitrary 2-character texts to declare spaces.
            $quiz_question_sanitized = htmlspecialchars($quiz_question, ENT_QUOTES, 'UTF-8');
            $quiz_question_formatted = str_replace($tags_allowed, $tags_converted, $quiz_question_sanitized);

            //lastly, quiz_question_finalized has the answer field put into it.
            $quiz_question_finalized = str_replace("[blank]", '<input name="user_answer">', $quiz_question_formatted);
        }
        

        //Assign quiz_id to session
        $_SESSION['quiz_id'] = $quiz_id;

        //Set variables in the view
        $data =
            [   
                'quiz_id' => $quiz_id,  
                'quizzes_int' => $quizzes_count,
                'quiz_question' => $quiz_question_finalized,
                'quiz_answer' => $quiz_answer,
                'quiz_type' => $quiz_type,
                'quiz_cooldown' => $quiz_cooldown_check
            ];
        return view('quiz', $data);
    }
}
