<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cards;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GameController extends Controller
{
    //function to get all the cards from the database
    public function GetUserData(Request $request)
    {
        $cards = Cards::where('user_id', $request->user_id)->get();
        return ($request);
    }

    public function unityLogin(Request $request)
    {
        $credentials = ['email' => $request->mail, 'password' => $request->password];
        if (!Auth::once($credentials)) {
            return;
        }
        $user = Auth::getUser();
        $data = [
            "user_id" => $user->id, 
            "username" => $user->name];
        return ($data);
    }
}

