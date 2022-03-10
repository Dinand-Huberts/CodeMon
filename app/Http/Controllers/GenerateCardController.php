<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GenerateCardController extends Controller
{
    public function generate_card()
    {

        //de controller gaat op zn bek wanneer er 1 box is.
        $box_id = $_GET['id'];
        $user_id = Auth::id();
        $boxes = DB::table('boxes')
            ->where('id', '=', $box_id)
            ->where('user_id', '=', $user_id)
            ->where('box_activated', '=', 0)
            ->orderBy('box_difficulty', 'asc')
            ->get();

        DB::table('boxes')
            ->where('id', '=', $box_id)
            ->where('user_id', '=', $user_id)
            ->where('box_activated', '=', 0)
            ->update(['box_activated' => 1]);
        $box_difficulty = $boxes[0]->box_difficulty;
        //difficulty scaling




        // Fetches everything from the teachers table
        $teachers = DB::table('teachers')->get();
        // Further idiotproofing to account for ID gaps
        $teacher_count = count($teachers);

        $docent_int = rand(0, ($teacher_count - 1));

        switch ($box_difficulty) {
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

        //Check if a result is given
        if (isset($teachers[$docent_int])) {
            //Fetch name and image
            $docent_name = $teachers[$docent_int]->name;
            $docent_img = "./img/card-images/" . $teachers[$docent_int]->id . ".png";
        }


$hp = rand($stat_min, $stat_max);
$attack = rand($stat_min, $stat_max);
$defense = rand($stat_min, $stat_max);
$special_attack = rand($stat_min, $stat_max);
$special_defense = rand($stat_min, $stat_max);
$speed = rand($stat_min, $stat_max);
$card_div = '<div class="cards_container">
<div id="cards">
    <figure class="card card--' . $rarity_name . '">
        <div class="card__image-container">
            <img src="' . $docent_img . '" alt="' . $docent_name . '" class="card__image" style="height: 200px; margin:auto">
        </div>
        <figcaption class="card__caption">
            <h1 class="card__name">' . $docent_name . ' </h1>
            <h3 class="card__type">' . $rarity_name . '</h3>
            <table class="card__stats">
                <tbody>
                    <tr>
                        <th>HP</th>
                        <td>' . $hp . '</td>
                    </tr>
                    <tr>
                        <th>Attack</th>
                        <td>' . $attack . '</td>
                    </tr>
                    <tr>
                        <th>Defense</th>
                        <td>' . $defense . '</td>
                    </tr>
                    <tr>
                        <th>Special Attack</th>
                        <td>' . $special_attack . '</td>
                    </tr>
                    <tr>
                        <th>Special Defense</th>
                        <td>' . $special_defense . '</td>
                    </tr>
                    <tr>
                        <th>Speed</th>
                        <td>' . $speed . '</td>
                    </tr>
                </tbody>
            </table>
            <div class="card__abilities">
                <h4 class="card__ability">
                    <span class="card__label">Ability</span>
                    Run Away
                </h4>
                <h4 class="card__ability">
                    <span class="card__label">Hidden Ability</span>
                    Anticipation
                </h4>
            </div>
        </figcaption>
    </figure>
</div>
</div>
';



            DB::table('card')->insert([
                'user_id' => $user_id,
                'card_rarity' => $rarity_data_int,
                'teacher_id' => $docent_int,
                'card_hp' => $hp,
                'card_attack' => $attack,
                'card_defense' => $defense,
                'card_special_attack' => $special_attack,
                'card_special_defense' => $special_defense,
                'card_speed' => $speed,

            ]);
            $boxes = DB::table('boxes')
            ->where('user_id', '=', $user_id)
            ->where('box_activated', '=', 0)
            ->orderBy('box_difficulty', 'desc')
            ->get();
            
        $box_count = count($boxes);
        $boxes_current = $boxes->first();
        if (isset($boxes_current)){
        $boxes_current_id = $boxes_current->id;
        $boxes_current_difficulty = $boxes_current->box_difficulty;
        echo json_encode([$card_div, $box_count , $boxes_current_id, $boxes_current_difficulty]);
        } else {
        echo json_encode([$card_div, $box_count , NULL, '0']);
        }
    }
}
