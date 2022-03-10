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
        // Further idiotproofing to account for ID gaps
        $teacher_count = count($teachers);

        $docent_int = rand(0, ($teacher_count- 1));
        $rarity_int = rand(1,10000);


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
            case $rarity_int >= 2500 && $rarity_int <= 10000:
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
                    
            //Check if a result is given
            if (isset($teachers[$docent_int])) {
                //Fetch name and image
                $docent_name = $teachers[$docent_int]->name;
                $docent_img = "./img/card-images/" . $teachers[$docent_int]->id . ".png";
            }
            


        $data = [
            'rarity_name'=>$rarity_name,
            'docent_name'=>$docent_name,
            'docent_img'=>$docent_img,
            'stat_max'=>$stat_max,
            'stat_min'=>$stat_min
        ];
            
        // return view('/components/card', ['rarity_int'=>$rarity_int], ['docent_int'=>$docent_int);
        return view('/components/card', $data);

    }
}
