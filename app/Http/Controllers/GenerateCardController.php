<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\Teacher;
use App\View\Components\box as ComponentsBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class GenerateCardController extends Controller
{
    public function generate_card_call(Request $request)
    {
        $boxes = Box
        ::where('user_id', '=', Auth::id())
        ->where('box_activated', '=', 0)
        ->get();

    // chaneg to last card, not box
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
    $card_div = '<div class="cards_container">
<div id="cards">
<figure class="card card--' . $rarity_name . '">
<div class="card__image-container">
    <img src="./img/card-images/' . $teachers[$randomTeacher]->id . '.png" alt="' . $teachers[$randomTeacher]->name . '" class="card__image" style="height: 200px; margin:auto">
</div>
<figcaption class="card__caption">
    <h1 class="card__name">' . $teachers[$randomTeacher]->name . ' </h1>
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

    $nextbox = Box
        ::where('user_id', '=', $user_id)
        ->where('box_activated', '=', 0)
        ->get();

    $box_count = count($nextbox);
    $boxes_current = $nextbox->first();

    // $boxes_current_id = (isset($boxes_current)) ? $boxes_current->id : null;
    $boxes_current_difficulty = (isset($boxes_current)) ? $boxes_current->box_difficulty : null;


    return view('box', [
        'boxes' => $boxes,
        'user_id' => Auth::id(),
        'box_count' => count($boxes),
        'boxes_current' => $boxes_current,
        'teachers' => $teachers,
        'randomTeacher' => $randomTeacher,
        'rarity_name' => $rarity_name,
        'hp' => $hp,
        'attack' => $attack,
        'defense' => $defense,
        'special_attack' => $special_attack,
        'special_defense' => $special_defense,
        'speed' => $speed
    ]);
            // return json_encode([$card_div, $box_count, $boxes_current_id, $boxes_current_difficulty]);
    }
}
