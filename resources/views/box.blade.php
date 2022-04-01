<x-app-layout>
    <div id="box" class="backdrop-blur-sm rounded-2xl"
        style="background-color: rgba(125, 125, 125, 0.2); width: 50vw; height: auto; padding:25px; margin-top: 10vh; margin-bottom: 10vh">


        <div id="wrapper" class="">

            @if (count($boxes))
                <p id="box_count_top_text"> Aantal boxes: </p>
                <p id="box_count">{{ count($boxes) }}</p><br>

                <p id="box_difficulty_top text">Current box difficulty: </p>
                <p id="box_difficulty">{{ $boxes[0]->box_difficulty }}</p>
            @endif

            <br>

            @if (count($boxes))
                <button id="generate_card_button" data-box-id="{{ $boxes[count($boxes) - 1]->id }}"
                    class="text-black bg-red-600 hover:bg-red-600 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-amber-500"
                    onclick="refreshPage()">Open
                    current box!</button>
            @else
                <div id="wrapper" class="m-10">
                    You don't have any boxes!
                </div>
            @endif

        </div>
        @if (isset($card))
            <div class="card_container" id="card_box" style="transform: scale(0.8)">
                <div class="cards_container">
                    <div id="cards">
                        <figure class="card card--{{ $card->card_rarity }}">
                            <div class="card__image-container">
                                <img src="./img/card-images/{{ $card->teacher_id }}.png"
                                    alt="{{ $card->teacher->name }}" class="card__image"
                                    style="height: 200px; margin:auto">
                            </div>
                            <figcaption class="card__caption">
                                <h1 class="card__name">{{ $card->teacher->name }} </h1>
                                <h3 class="card__type"> {{ $card->rarity->rarities }}</h3>
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
                                            <td>{{ $card->card_special_defense }}</td>
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
                                        {{$card->ability}}
                                    </h4>
                                    <h4 class="card__ability">
                                        <span class="card__label">Hidden Ability</span>
                                        {{$card->hidden_ability}}
                                    </h4>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
    </div>
    @endif

    <script>
        function refreshPage() {
            $("#dashboard_card").load(window.location.href + " #dashboard_card");
        }
    </script>


</x-app-layout>
