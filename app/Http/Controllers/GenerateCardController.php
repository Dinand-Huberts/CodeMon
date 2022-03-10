<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GenerateCardController extends Controller
{
    public function generate_card() {
        $box_id = $_GET['id'];
        $user_id = Auth::id();
        
        $boxes = DB::table('boxes')
        ->where('id', '=', $box_id )
        ->where('user_id', '=', $user_id)
        ->where('box_activated', '=', 0 )
        ->get();
        $box_difficulty = $boxes[0]->box_difficulty;
        

echo json_encode([$box, $]);
    }
}
