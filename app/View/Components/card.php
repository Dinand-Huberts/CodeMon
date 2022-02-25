<?php

namespace App\View\Components;

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
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        //Difficulty tier of box taken. For debug purposes, it's set to a fixed value.
        $diff = 0;
        //Max random number (less makes rare cards more common)
        $maxnum = 10000 - $diff * 750;
        $rand = rand(1,$maxnum);
        return view('/layouts/card', ['rand'=>$rand]);
    }
}
