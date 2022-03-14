<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Facade\FlareClient\View;
use Illuminate\View\Component;

class card extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // leeg
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        // Fetches everything from the teachers table
        $teachers = DB::table('teachers')->get();


        // Fetches everything from the teachers table
        $user_id = Auth::id();
        $card = DB::table('card')
            ->join('teachers', 'card.teacher_id', '=', 'teachers.id')
            ->join('rarity', 'card.card_rarity', '=', 'rarity.id')
            ->where('user_id', '=', $user_id)
            ->select('teachers.name', 'teachers.img', 'rarity.rarity', 'card.*')
            ->orderBy('rarity', 'asc')
            ->get();
        
        // dd($card);



        return view('/components/card', ['card'=>$card]);

    }
}







  //         $card_rarity = $card->card_rarity;

    // switch ($card_rarity) {
    //         case 1:
    //             $rarity_name = 'legendary';
    //             $rarity_data_int = 1;
    //             break;
    //         case 2:
    //             $rarity_name = 'epic';
    //             $rarity_data_int = 2;
    //             break;
    //         case 3:
    //             $rarity_name = 'rare';
    //             $rarity_data_int = 3;
    //             break;
    //         case 4:
    //             $rarity_name = 'uncommon';
    //             $rarity_data_int = 4;
    //             break;
    //         case 5:
    //             $rarity_name = 'common';
    //             $rarity_data_int = 5;
    //             break;
    //         //Fallback case
    //         default:
    //             $rarity_name = 'undefined';
    //             $rarity_data_int = 0;
    //             break;
    //         }
