<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{
    public static function render()
    {
        $boxes = Box
            ::where('user_id', '=', Auth::id())
            ->where('box_activated', '=', 0)
            ->get();

            // chaneg to last card, not box
        $card = Box::where('user_id', Auth::id())->where('box_activated', 1)->first();

        return view('box', ['boxes' => $boxes, 'user_id' => Auth::id(), 'box_count' => count($boxes), 'boxes_current' => $currentBox]);

    }
}
