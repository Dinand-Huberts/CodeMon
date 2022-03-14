<?php

use App\Http\Controllers\GenerateCardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/quiz', function () {
    return view('quiz');
});

Route::get('/generate_card', [GenerateCardController::class, 'generate_card_call']);

require __DIR__ . '/auth.php';  