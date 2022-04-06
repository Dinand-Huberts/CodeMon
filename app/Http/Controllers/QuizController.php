<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\QuizSelectorController;
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

        
        $cooldown = strtotime(Auth::user()->quiz_cooldown);
        $time = time();
        $interval = $time - $cooldown;
        if ($interval >= 14400) {
            $quiz_cooldown_check = true;
        } else {
            $quiz_cooldown_check = false;
        }

        // Fetches everything with the assigned difficulty from the quizzes table
        $quizzes = DB::table('quizzes')->where('quiz_difficulty', '=', $_GET['difficulty'])->get();

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
            $quiz_question_finalized = str_replace("[blank]", '<input name="user_answer" autocomplete="off">', $quiz_question_formatted);
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
    public function quizcheck(Request $request) {
        session_start();
        if (!isset($_SESSION['quiz_id'])) {
            return redirect()->route('quizselector');
        } else{
            //get and set user_id
            $user_id = Auth::id();
            //Get quiz info with corresponding id
            $quiz = DB::table('quizzes')
                ->where('id', '=', $_SESSION['quiz_id'])
                ->get();
                $users_data = ['quiz_cooldown' => date('Y-m-d, H:i:s', time())];
                DB::table('users')
                ->where('id', '=', $user_id)
                ->update($users_data);
            if ($quiz[0]->quiz_answer == $request->user_anwer) {
                $boxes_data = ['user_id' => $user_id, 'box_difficulty' => $quiz[0]->quiz_difficulty];
                DB::table('boxes')->insert($boxes_data);
                $answer = "<script>alert('Goed antwoord!')</script>";
            } else {
                $answer = "<script>alert('Fout antwoord!')</script>";
            }
            unset($_SESSION['quiz_id']);
            $data = [
                'answer' => $answer
            ];
            return redirect()->route('box',  $data);
        }    
    }
}
