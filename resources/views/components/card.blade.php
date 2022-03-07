<h3>Congratulations! You found a {{ $rarity_name . ' ' . $docent_name }}</h3>
<div class="cards_container">
    <div id="cards">
        {{-- card--normal kan zijn: --water, --electric, --fire, -psychic, --dark, --grass, --ice, --fairy --}}
        <figure class="card card--normal">
            <div class="card__image-container">
                <img src="{{ $docent_img }}" alt="{{ $docent_name }}" class="card__image" style="height: 200px; margin:auto">
            </div>
            <figcaption class="card__caption">
                <h1 class="card__name">{{ $docent_name }}</h1>
                <h3 class="card__type">{{ $rarity_name }}</h3>
                <table class="card__stats">
                    <tbody>
                        <tr>
                            <th>HP</th>
                            <td>{{ rand(30, 140) }}</td>
                        </tr>
                        <tr>
                            <th>Attack</th>
                            <td>{{ rand(30, 140) }}</td>
                        </tr>
                        <tr>
                            <th>Defense</th>
                            <td>{{ rand(30, 140) }}</td>
                        </tr>
                        <tr>
                            <th>Special Attack</th>
                            <td>{{ rand(30, 140) }}</td>
                        </tr>
                        <tr>
                            <th>Special Defense</th>
                            <td>{{ rand(30, 140) }}</td>
                        </tr>
                        <tr>
                            <th>Speed</th>
                            <td>{{ rand(30, 140) }}</td>
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
