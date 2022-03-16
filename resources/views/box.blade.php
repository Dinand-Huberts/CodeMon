
<x-guest-layout>

<div id="box" class="home_content backdrop-blur-sm rounded-2xl flex center"
    style="background-color: rgba(125, 125, 125, 0.2); width: 80%; height: auto;">


        <div id="wrapper" class="m-10">

            @if (count($boxes))
                <p id="box_count_top_text"> Aantal boxes: </p>
                <p id="box_count">{{ count($boxes) }}</p><br>

                <p id="box_difficulty_top text">Current box difficulty: </p>
                <p id="box_difficulty">{{ $boxes[0]->box_difficulty }}</p>
            @endif

            <br>

            @if (count($boxes))
                <button id="generate_card_button" data-box-id="{{ $boxes[count($boxes) - 1]->id }}"
                    class="text-black bg-red-600 hover:bg-red-600 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-amber-500">Open
                    current box!</button>
            @else
                <div id="wrapper" class="m-10">
                    You don't have any boxes left!
                </div>
            @endif

        </div>
        @if (!isset($card))
            
        <div id="card_container">
            <div class="cards_container">
                <div id="cards">
                    <figure class="card card--{{ $card->card_rarity }}">
                    <div class="card__image-container">
                        <img src="./img/card-images/{{ $card->teacher_id }}.png" alt="{{ $card->teacher->name }}" class="card__image" style="height: 200px; margin:auto">
                    </div>
                    <figcaption class="card__caption">
                        <h1 class="card__name">{{ $card->teacher->name }} </h1>
                        <h3 class="card__type"> {{ $card->card_rarity }}</h3>
                        <table class="card__stats">
                            <tbody>
                                <tr>
                                    <th>HP</th>
                                    <td>{{ $card->hp }}</td>
                                </tr>
                                <tr>
                                    <th>Attack</th>
                                    <td>{{ $card->card_attack }}</td>
                                </tr>
                                <tr>
                                    <th>Defense</th>
                                    <td>{{ $card->card_defense }}</td>
                                </tr>
                                <tr>
                                    <th>Special Attack</th>
                                    <td>{{ $card->card_special_attack }}</td>
                                </tr>
                                <tr>
                                    <th>Special Defense</th>
                                    <td>{{ $card->card_defense }}</td>
                                </tr>
                                <tr>
                                    <th>Speed</th>
                                    <td>{{ $card->card_speed }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="card__abilities">
                            <h4 class="card__ability">
                                <span class="card__label">Ability</span>
                                Run Away
                            </h4>
                            <h4 class="card__ability">
                                <span class="card__label">Hidden Ability</span>
                                Anticipation
                            </h4>
                        </div>
                    </figcaption>
                </figure>
                </div>
            </div>
        </div>
</div>
@endif

{{-- DB::table('boxes')->insert([
    'box_activated' => 1
]); --}}


{{-- @foreach ($boxes as $box)
        <div class="container">
            <div class="m-10">
                <div class="box-body">
                    <img class="img" src="https://via.placeholder.com/150">
                    <div class="box-lid">
                        <div class="box-bowtie"></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}

</x-guest-layout>