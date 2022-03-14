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
<<<<<<< HEAD
        $card = DB::table('cards')
            ->where('user_id', '=', $user_id)->get();


        // $rarity_int = $card->card_rarity;
        // $docent_int = $card->teacher_id;


        // switch ($rarity_int) {
        //     case $rarity_int >= 0 && $rarity_int <= 50:
        //         $rarity_name = 'legendary';
        //         $rarity_data_int = 1;
        //         $stat_max = 140;
        //         $stat_min = 70;
        //         break;
        //     case $rarity_int >= 50 && $rarity_int <= 250:
        //         $rarity_name = 'epic';
        //         $rarity_data_int = 2;
        //         $stat_max = 125;
        //         $stat_min = 60;
        //         break;
        //     case $rarity_int >= 250 && $rarity_int <= 750:
        //         $rarity_name = 'rare';
        //         $rarity_data_int = 3;
        //         $stat_max = 110;
        //         $stat_min = 50;
        //         break;
        //     case $rarity_int >= 750 && $rarity_int <= 2500:
        //         $rarity_name = 'uncommon';
        //         $rarity_data_int = 4;
        //         $stat_max = 95;
        //         $stat_min = 40;
        //         break;
        //     case $rarity_int >= 2500 && $rarity_int <= 10000:
        //         $rarity_name = 'common';
        //         $rarity_data_int = 5;
        //         $stat_max = 80;
        //         $stat_min = 30;
        //         break;
        //         //Fallback case
        //     default:
        //         $rarity_name = 'undefined';
        //         $rarity_data_int = 0;
        //         $stat_max = 0;
        //         $stat_min = 0;
        //         break;
        // }

        // //Check if a result is given
        // if (isset($teachers[$docent_int])) {
        //     //Fetch name and image
        //     $docent_name = $teachers[$docent_int]->name;
        //     $docent_img = "./img/card-images/" . $teachers[$docent_int]->id . ".png";
        // }

        return view('/components/card', ['card' => $card]);
=======
        $card = DB::table('card')
            ->join('teachers', 'card.teacher_id', '=', 'teachers.id')
            ->join('rarity', 'card.card_rarity', '=', 'rarity.id')
            ->where('user_id', '=', $user_id)
            ->select('teachers.name', 'teachers.img', 'rarity.rarity', 'card.*')
            ->orderBy('rarity', 'asc')
            ->get();
        
        // dd($card);



        return view('/components/card', ['card'=>$card]);

>>>>>>> 69feff6784222ffd3b995fe87b2db6b63e4358e8
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
