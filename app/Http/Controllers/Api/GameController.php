<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    //function to get a specific cards' data from the database
    public function GetCard($id, $user_id)
    {
        //first get the card with the corresponding id
        foreach (Cards::where('id', $id)->get() as $card) {
            //then get the user's data
            foreach (Auth::user()->where('id', $user_id)->get() as $user) {
                //then return the card's data
                return response()->json([
                    'id' => $card->id,
                    'user_id' => $card->user_id,
                    'name' => $card->name,
                    'description' => $card->description,
                    'image' => $card->image,
                ]);
            }
        }
        $card = Cards::where('id', '=', $id)->where('user_id', '=', $user_id)->first();
        //then return the card
        return $card;
    }
    //function to get all the cards from the database
    public function GetInventory($user_id)
    {
        //first get all cards
        $cards = Cards::where('user_id', '=', $user_id)->get();
        //then return all cards in inventory
        return $cards;
    }

    //function to get all info needed for the match
    public function GetMatchInfo($user_id, $user_cards_id, $defender_id, $defender_cards_id)
    {
        //first get the user's cards
        $user_cards = $this->GetCard($user_cards_id, $user_id);
        //then get the defender's cards
        $defender_cards = $this->GetCard($defender_cards_id, $defender_id);
        //then get the match info        
        $data = [
            'user_card' => $user_cards,
            'defender_card' => $defender_cards
        ];
        //return the match info
        return $data;
    }

        

}
