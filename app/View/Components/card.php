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
        $docent_int = rand(1,10);
        $rarity_int = rand(1,10000);
        return view('/layouts/card', ['rarity_int'=>$rarity_int], ['docent_int'=>$docent_int]);
    }
}
