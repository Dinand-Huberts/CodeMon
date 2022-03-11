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
    public function generate_card(Request $request)
    {
            return BoxController::render($request);
            // return json_encode([$card_div, $box_count, $boxes_current_id, $boxes_current_difficulty]);
    }
}
