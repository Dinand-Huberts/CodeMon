@if (count($card) == 0)
    <div class="backdrop-blur-sm rounded-2xl" id="box"
        style="background-color: #7d7d7d33; width: 50vw; height: 20vh; padding:25px; margin-left: 5vw;">
        <div id="wrapper" class="m-10">
            You don't have cards. Go make a quiz!
        </div>
    </div>
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
                                {{$item->Ability->abilities}}
                            </h4>
                            <h4 class="card__ability">
                                <span class="card__label">Hidden Ability</span>
                                {{$item->hidden_Ability->abilities}}
                            </h4>
                        </div>
                    </figcaption>
                </figure>
            </div>
        </div>
    @endforeach
@endif

</div>
