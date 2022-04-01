<div>
    <div id="card_wrapper">
        <div id="cards">
            <figure class="card card--uncommon">
                <div class="card__image-container">
                    <img src="{{ $teacher->img }}" alt="{{ $teacher->name }}" class="card__image"
                        style="height: 200px; margin:auto; width: auto;">
                </div>
                <figcaption class="card__caption">
                    <h1 class="card__name"> {{ $teacher->name }} </h1>
                    <h3 class="card__type">Uncommon</h3>
                    <table class="card__stats">
                        <tbody>
                            <tr>
                                <th>HP</th>
                                <td>{{ $card->card_hp }}</td>
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
