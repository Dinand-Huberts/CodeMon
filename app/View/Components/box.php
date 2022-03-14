<?php

namespace App\View\Components;

use App\Http\Controllers\BoxController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class box extends Component
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(Request $request)
    {
        return BoxController::generate_card(Request);
    }

}
