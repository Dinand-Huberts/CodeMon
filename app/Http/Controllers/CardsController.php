<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardsController extends Controller
{

    public function index(Request $request)
    {
        $this->URLCheck($request);

        $cards = Cards::where('user_id', '=', Auth::id())->get();
        $card_amount = count($cards);
        $maxpages = ceil($card_amount / $_GET['v']);
        $data = [
            'maxpages' => $maxpages
        ];
        return view('cards', $data);
    }
    public function orderby(Request $request)
    {
        switch ($request->get('orderby')) {
            case 'rarity':
                $orderbyfilter = 'card_rarity';
                break;
            case 'teacher':
                $orderbyfilter = 'teacher_id';
                break;
            case 'hp':
                $orderbyfilter = 'card_hp';
                break;
            case 'attack':
                $orderbyfilter = 'card_attack';
                break;
            case 'defense':
                $orderbyfilter = 'card_defense';
                break;
            case 'special_attack':
                $orderbyfilter = 'card_special_attack';
                break;
            case 'special_defense':
                $orderbyfilter = 'card_special_defense';
                break;
            case 'speed':
                $orderbyfilter = 'card_speed';
                break;
            default:
                $orderbyfilter = NULL;
                break;
        }
        $page = $_GET['p'];
        $maxview = $_GET['v'];
        $offset = $page * $maxview;
        $cards_ordered = Cards::where('user_id', '=', Auth::id())->offset($offset)->limit($maxview)->orderby($orderbyfilter)->get();

        foreach ($cards_ordered as $item) {
            $card_div[] = '<div id="card_wrapper">
            <div id="cards">
                <figure class="card card--' . $item->rarity->rarities . '">
                    <div class="card__image-container">
                        <img src="' . $item->teacher->img . '" alt="' . $item->teacher->name . '" class="card__image"
                            style="height: 200px; margin:auto; width: auto;">
                    </div>
                    <figcaption class="card__caption">
                        <h1 class="card__name"> ' . $item->teacher->name . ' </h1>
                        <h3 class="card__type">' . $item->rarity->rarities . '</h3>
                        <table class="card__stats">
                            <tbody>
                                <tr>
                                    <th>HP</th>
                                    <td>' . $item->card_hp . '</td>
                                </tr>
                                <tr>
                                    <th>Attack</th>
                                    <td>' . $item->card_attack . '</td>
                                </tr>
                                <tr>
                                    <th>Defense</th>
                                    <td>' . $item->card_defense . '</td>
                                </tr>
                                <tr>
                                    <th>Special Attack</th>
                                    <td>' . $item->card_special_attack . '</td>
                                </tr>
                                <tr>
                                    <th>Special Defense</th>
                                    <td>' . $item->card_special_defense . '</td>
                                </tr>
                                <tr>
                                    <th>Speed</th>
                                    <td>' . $item->card_speed . '</td>
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
        </div>';
        }
        return json_encode($card_div);
    }
    public function URLCheck($request)
    {
        // If user sets get parameters to an
        // string, the user will be redirected
        // to cards without parameters.


        //check if P is NOT set and V is NOT set
        if (!isset($_GET['p']) && !isset($_GET['v'])) {
            header('Location: /cards?p=0&v=25');
            exit();
        }
        //check if P is NOT set and V IS set
        if (!isset($_GET['p']) && isset($_GET['v'])) {
            header('Location: /cards?p=0&v=' . $_GET["v"]);
            exit();
        }
        //check if P IS set and V is NOT set
        if (isset($_GET['p']) && !isset($_GET['v'])) {
            header('Location: /cards?p=' . $_GET["p"] . '&v=25');
            exit();
        }

        if (filter_var($_GET['p'], FILTER_VALIDATE_INT) === false || filter_var($_GET['v'], FILTER_VALIDATE_INT) === false) {
            header('Location: /cards');
            exit();
        }
    }
}
