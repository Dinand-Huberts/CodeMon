<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Facade\FlareClient\View;
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
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        
        $user_id = Auth::id();
        $boxes = DB::table('boxes')->where('user_id', '=', $user_id)->get();
        return view('/components/box', ['boxes'=>$boxes], ['user_id'=>$user_id]);
        
    }
}
