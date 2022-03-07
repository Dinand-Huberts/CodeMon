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
        //
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

        switch ($rarity_int) {
            case $rarity_int >= 0 && $rarity_int <= 50:
                $rarity_name = 'legendary';
                $rarity_data_int = 1;
                break;
                case $rarity_int >= 50 && $rarity_int <= 250:
                    $rarity_name = 'epic';
                    $rarity_data_int = 2;
                break;
                case $rarity_int >= 250 && $rarity_int <= 750:
                    $rarity_name = 'rare';
                    $rarity_data_int = 3;
                break;
                case $rarity_int >= 750 && $rarity_int <= 2500:
                    $rarity_name = 'uncommon';
                    $rarity_data_int = 4;
                    break;
                    case $rarity_int >= 2500 && $rarity_int <= 10000:
                        $rarity_name = 'common';
                        $rarity_data_int = 5;
                        break;
                    }
                    
            if (isset($teachers[$docent_int])) {
                $docent_name = $teachers[$docent_int]->name;
                $docent_img = "./img/card-images/" . $teachers[$docent_int]->id . ".png";
            }
            // $docent_name = 

        $data = [
            'rarity_name'=>$rarity_name,
            'docent_name'=>$docent_name,
            'docent_img'=>$docent_img
        ];
            
        // return view('/components/card', ['rarity_int'=>$rarity_int], ['docent_int'=>$docent_int);
        return view('/components/card', $data);

    }
}
