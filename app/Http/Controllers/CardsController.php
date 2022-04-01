<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardsController extends Controller
{
    public function index()
    {
        return view('cards');
    }
    public function orderby(Request $request){
        $order = $request->get('orderby');
        Cards::where('user_id', Auth::id())->orderby($order);
        //dit moet returnen in de kaarten tab
    }
}
