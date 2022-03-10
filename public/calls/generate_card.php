<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Facade\FlareClient\View;

        $box_id = $_POST['id'];
        $user_id = Auth::id();
        $boxes = DB::table('boxes')
        ->where('id', '=', $box_id )
        ->where('user_id', '=', $user_id)
        ->where('box_activated', '=', 0 )
        ->get();
        $box_difficulty = $boxes[0]->box_difficulty;

echo json_encode([$box_id, $box_difficulty]);