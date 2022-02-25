@php
switch ($rarity_int) {
    case $rarity_int >= 0 && $rarity_int <= 50:
        $rarity_name = 'legendary';
        $rarity_data_int = 1;
        break;
    case $rarity_int >= 50 && $rarity_int <= 250:
        $rarity_name = 'epic';
        $rarity_data_int = 2;
        break;
    case $rarity_int >= 250 && $rarity_int <= 750:
        $rarity_name = 'rare';
        $rarity_data_int = 3;
        break;
    case $rarity_int >= 750 && $rarity_int <= 2500:
        $rarity_name = 'uncommon';
        $rarity_data_int = 4;
        break;
    case $rarity_int >= 2500 && $rarity_int <= 10000:
        $rarity_name = 'common';
        $rarity_data_int = 5;
        if ($rarity_int == 10000) {
            $shiny = true;
        }
        break;
}
switch ($docent_int) {
    case 1:
        $docent_img = "/image-cards/1.png";
        $docent_int = 1;
        $docent_name = 'Thomas';
        break;
    case 2:
        $docent_img = "/image-cards/2.png";
        $docent_int = 2;
        $docent_name = 'Jos';
        break;
    case 3:
        $docent_img = "https://mijnstudie.net/avatar/12";
        $docent_int = 3;
        $docent_name = 'Wijnand';
        break;
    case 4:
        $docent_img = "https://mijnstudie.net/avatar/7";
        $docent_int = 4;
        $docent_name = 'Gerben';
        break;
    case 5:
        $docent_img = "https://mijnstudie.net/avatar/8";
        $docent_int = 5;    
        $docent_name = 'Sinnika';
        break;
    case 6:
        $docent_img = "https://mijnstudie.net/avatar/9";
        $docent_int = 6;
        $docent_name = 'Ton';
        break;
    case 7:
        $docent_img = "https://mijnstudie.net/avatar/3";
        $docent_int = 7;
        $docent_name = 'Pim';
        break;
    case 8:
        $docent_img = "https://mijnstudie.net/avatar/8";
        $docent_int = 8;
        $docent_name = 'Sinnika';
        break;

}
@endphp


<html>
<meta name="viewport" content="width=device-width, initial-scale=1">



<h3>Gefeliciteerd! Je hebt een {{ $rarity_name . ' ' . $docent_name }}</h3>

<div id="cards">  

    <figure class="card card--normal">
      <div class="card__image-container">
        <img src="https://mijnstudie.net/avatar/3" alt="Eevee" class="card__image">   
      </div>
      
      <figcaption class="card__caption">
        <h1 class="card__name">{{$docent_name}}</h1>
    
        <h3 class="card__type">
          {{$rarity_name}}
        </h3>
    
        <table class="card__stats">
          <tbody><tr>
            <th>HP</th>
            <td>55</td>
          </tr>
          <tr>
            <th>Attack</th>
            <td>55</td>
          </tr>
          
          <tr>
            <th>Defense</th>
            <td>50</td>
          </tr>
    
          <tr>
            <th>Special Attack</th>
            <td>45</td>
          </tr>
          <tr>
            <th>Special Defense</th>
            <td>65</td>
          </tr>
          <tr>
            <th>Speed</th>  
            <td>55</td>
          </tr>
        </tbody></table>
        
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
    </script>
      

</html>
