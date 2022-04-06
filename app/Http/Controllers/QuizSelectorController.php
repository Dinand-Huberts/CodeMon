<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizSelectorController extends Controller
{
    public function index()
    {
       //get and set user_id
       $user_id = Auth::id();


       //cooldown check
       $cooldown_query = DB::table('users')->where('id', '=', $user_id)->get();
       $cooldown_string = $cooldown_query[0]->quiz_cooldown;
       $cooldown = strtotime($cooldown_string);
       $cooldown_until = $cooldown + 14400;
       $time = time();
       $interval = $time - $cooldown;
       if ($interval >= 14400) {
           $onload = '';
           $quiz_cooldown_check = true;
       } else {
           $onload = 'countdown_quiz(' . $cooldown_until  . ')';
           $quiz_cooldown_check = false; 
       }

       $difference = 14400  - $interval;
       $hours = round(($difference / 60 / 60));
       $minutes = ($difference / 60) % 60;
       $seconds = $difference % 60;


       //set variables in the view
       $data =
           [
               'quiz_cooldown' => $quiz_cooldown_check,
               'hours' => $hours,
               'minutes' => $minutes,
               'seconds' => $seconds,
               'cooldown' => $cooldown,
               'interval' => $interval,
               'onload' => $onload,
               'cooldown_until' => $cooldown_until,
           ];

       return view('quizselector', $data);
    }
}
