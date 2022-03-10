<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Facade\FlareClient\View;

use App\Models\dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        }1

        if ($_GET) {
            session_start();
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
        $data = [
            'onload' => $onload
        ];
        return view('dashboard', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(dashboard $dashboard)
    {
        //
    }
}
