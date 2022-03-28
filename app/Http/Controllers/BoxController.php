<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\Cards;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BoxController extends Controller
{
    public function index($layout = true)
    {
                session_start();
                //Get and set user_id
                $user_id = Auth::id();

                //Set cooldown variables
                $cooldown_query = DB::table('users')->where('id', '=', $user_id)->get();
                $cooldown_string = $cooldown_query[0]->quiz_cooldown;
                $cooldown = strtotime($cooldown_string);
                $cooldown_until = $cooldown + 14400;
                $time = time();
                $interval = $time - $cooldown;
                //Cooldown check
                if ($interval >= 14400) {
                    $onload = '';
                    $quiz_cooldown_check = true;
                } elseif ($interval < 14400) {
                    $onload = 'countdown_quiz(' . $cooldown_until  . ')';
                    $quiz_cooldown_check = false;
                }
        
                if ($_GET) {
                    if (isset($_SESSION['quiz_id'])) {
                        //get and set user_id
                        $user_id = Auth::id();
        
                        //Get quiz info with corresponding id
                        $quiz = DB::table('quizzes')
                            ->where('id', '=', $_SESSION['quiz_id'])
                            ->get();
                        $quiz_answer = $quiz[0]->quiz_answer;
                        $quiz_difficulty = $quiz[0]->quiz_difficulty;
                        $user_answer_boolean = $_GET['user_answer'] == $quiz_answer;
                        if ($user_answer_boolean) {
                            $users_data = ['quiz_cooldown' => date('Y-m-d, H:i:s', time())];
                            $boxes_data = ['user_id' => $user_id, 'box_difficulty' => $quiz_difficulty];
                            DB::table('boxes')->insert($boxes_data);
                            DB::table('users')
                                ->where('id', '=', $user_id)
                                ->update($users_data);
                            echo "<script>alert('Goed antwoord!')</script>";
                        } else {
                            $users_data = ['quiz_cooldown' => date('Y-m-d, H:i:s', time())];
                            DB::table('users')
                                ->where('id', '=', $user_id)
                                ->update($users_data);
                            echo "<script>alert('Fout antwoord!')</script>";
                        }
                        unset($_SESSION['quiz_id']);
                    } else {
                        //reroute user to page with no parameters
                        $host = $_SERVER['HTTP_HOST'];
                        $uri = 'codemon.test/';
                        header('Location: /dashboard');
                        exit();
                    }
                }
        
        $boxes = Box::where('user_id', '=', Auth::id())
            ->where('box_activated', '=', 0)
            ->get();

        // chaneg to last card, not box
        $card = Cards::where('user_id', Auth::id())->orderBy('id', 'desc')->first();

        return view('box', ['boxes' => $boxes, 'card' => $card, 'layout' => $layout]);
    }

    public function generate(Request $request)
    {
        
        $boxes = Box
            ::where('user_id', '=', Auth::id())
            ->where('box_activated', '=', 0)
            ->get();

        // change to last card, not box
        $card = Box::where('user_id', Auth::id())->where('box_activated', 1)->first();


        $user_id = Auth::id();

        $box = Box::find($request->get('id'));

        if ($box->user_id !== Auth::id()) {
            return json_encode([NULL, '0', NULL, '0']);
        }

        if ($box->box_activated !== 0) {
            return json_encode([NULL, '0', NULL, '0']);
        }

        //difficulty scaling
        switch ($box->box_difficulty) {
            case 1:
                $max_rand_int = 10000;
                $rarity_int = rand(1, $max_rand_int);
                break;
            case 2:
                $max_rand_int = 8750;
                $rarity_int = rand(1, $max_rand_int);
                break;
            case 3:
                $max_rand_int = 7500;
                $rarity_int = rand(1, $max_rand_int);
                break;
            case 4:
                $max_rand_int = 6250;
                $rarity_int = rand(1, $max_rand_int);
                break;
            case 5:
                $max_rand_int = 5000;
                $rarity_int = rand(1, $max_rand_int);
                break;
        }

        //Depending on $rarity_int, chooses a card rarity when it's under a certain treshold.
        //$rarity_name = Actual name of card rarity. Used in determining the class/name.
        //$rarity_data_int = Actual identifier of the rarity. Lower is more common, usually.
        //$stat_max = Higher bound of the card's randomized stats.
        //$stat_min = Lower bound of the card's randomized stats.

        switch ($rarity_int) {
            case $rarity_int >= 0 && $rarity_int <= 50:
                $rarity_name = 'legendary';
                $rarity_data_int = 1;
                $stat_max = 140;
                $stat_min = 70;
                break;
            case $rarity_int >= 50 && $rarity_int <= 250:
                $rarity_name = 'epic';
                $rarity_data_int = 2;
                $stat_max = 125;
                $stat_min = 60;
                break;
            case $rarity_int >= 250 && $rarity_int <= 750:
                $rarity_name = 'rare';
                $rarity_data_int = 3;
                $stat_max = 110;
                $stat_min = 50;
                break;
            case $rarity_int >= 750 && $rarity_int <= 2500:
                $rarity_name = 'uncommon';
                $rarity_data_int = 4;
                $stat_max = 95;
                $stat_min = 40;
                break;
            case $rarity_int >= 2500 && $rarity_int <= $max_rand_int:
                $rarity_name = 'common';
                $rarity_data_int = 5;
                $stat_max = 80;
                $stat_min = 30;
                break;
                //Fallback case
            default:
                $rarity_name = 'undefined';
                $rarity_data_int = 0;
                $stat_max = 0;
                $stat_min = 0;
                break;
        }

        // Fetches everything from the teachers table
        $teachers = Teacher::all();
        $randomTeacher = rand(0, (count($teachers) - 1));

        //Check if a result is given
        if (!isset($teachers[$randomTeacher])) {
            return json_encode([NULL, '0', NULL, '0']);
        }

        $hp = rand($stat_min, $stat_max);
        $attack = rand($stat_min, $stat_max);
        $defense = rand($stat_min, $stat_max);
        $special_attack = rand($stat_min, $stat_max);
        $special_defense = rand($stat_min, $stat_max);
        $speed = rand($stat_min, $stat_max);

        DB::table('cards')->insert([
            'user_id' => $user_id,
            'card_rarity' => $rarity_data_int,
            'teacher_id' => $teachers[$randomTeacher]->id,
            'card_hp' => $hp,
            'card_attack' => $attack,
            'card_defense' => $defense,
            'card_special_attack' => $special_attack,
            'card_special_defense' => $special_defense,
            'card_speed' => $speed,
        ]);

        $box->box_activated = 1;
        $box->save();

        return $this->index(false);
    }
}
