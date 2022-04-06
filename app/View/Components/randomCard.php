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
        $teacher = Teacher::inRandomOrder()->first();

        $cards = array(rand(40, 95), rand(40, 95), rand(40, 95), rand(40, 95), rand(40, 95), rand(40, 95));

        $ability = Ability::inRandomOrder()->first();
        $hidden_ability = Ability::inRandomOrder()->first();

        return view('components.random-card', ['card' => $cards, 'teacher' => $teacher, 'ability' => $ability, 'hidden_ability' => $hidden_ability ]);
    }
}
