<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Facade\FlareClient\View;
use Illuminate\View\Component;


class Quizselector extends Component
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
            ];

        return view('/components/Quizselector', $data);
    }
}
