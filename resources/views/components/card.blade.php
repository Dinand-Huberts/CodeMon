@if (count($card) == 0)
    <h1 style="margin: 40vh; font-size:1.5vw">You don't have cards. <br> Go make a quiz!</h1>
@else
    @foreach ($card as $item)
        <div id="card_wrapper">
            <div id="cards">
                <figure class="card card--{{ $item->rarity->rarities }}">
                    <div class="card__image-container">
                        <img src="{{ $item->teacher->img }}" alt="{{ $item->teacher->name }}" class="card__image"
                            style="height: 200px; margin:auto; width: auto;">
                    </div>
                    <figcaption class="card__caption">
                        <h1 class="card__name"> {{ $item->teacher->name }} </h1>
                        <h3 class="card__type">{{ $item->rarity->rarities }}</h3>
                        <table class="card__stats">
                            <tbody>
                                <tr>
                                    <th>HP</th>
                                    <td>{{ $item->card_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Attack</th>
                                    <td>{{ $item->card_attack }}</td>
                                </tr>
                                <tr>
                                    <th>Defense</th>
                                    <td>{{ $item->card_defense }}</td>
                                </tr>
                                <tr>
                                    <th>Special Attack</th>
                                    <td>{{ $item->card_special_attack }}</td>
                                </tr>
                                <tr>
                                    <th>Special Defense</th>
                                    <td>{{ $item->card_special_defense }}</td>
                                </tr>
                                <tr>
                                    <th>Speed</th>
                                    <td>{{ $item->card_speed }}</td>
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
    @endforeach
    <div id="new_card">
        
    </div>
@endif
