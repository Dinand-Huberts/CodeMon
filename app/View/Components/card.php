<?php

namespace App\View\Components;

use App\Models\Cards;
use App\Models\Teacher;
use App\Models\User;
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
        // leeg
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        //TODO pagination toevoegen.
        //default order by rarity
        $page = $_GET['p'];
        $maxview = $_GET['v'];
        $offset = $page * $maxview;
        
        $cards = Cards::where('user_id', '=', Auth::id())->offset($offset)->orderby('card_rarity')->limit($maxview)->get();
        return view('/components/card', ['card' => $cards]);
    }
}
