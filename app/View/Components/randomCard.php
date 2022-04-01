<?php

namespace App\View\Components;

use App\Models\Ability;
use App\Models\Cards;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class randomCard extends Component
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
        $cards = Cards::inRandomOrder()->first();
        $teacher = Teacher::inRandomOrder()->first();





        return view('components.random-card', ['card' => $cards, 'teacher' => $teacher]);
    }
}
