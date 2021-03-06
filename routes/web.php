<?php

use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizSelectorController;
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

Route::get('/privacy-policy', function () {
    return view('privacy');
});

Route::get('/licensing', function () {
    return view('licensing');
});
Route::post('/api/unitylogin', [GameController::class, 'unityLogin']);

Route::middleware('auth')->group(function () {
    Route::get('/box', [BoxController::class, 'index'])->name('box');

    Route::get('/quizselector', [QuizSelectorController::class, 'index'])->name('quizselector');

    Route::get('/quiz', [QuizController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'index']);

    Route::get('/cards', [CardsController::class, 'index']);

    Route::get('/generate_card', [BoxController::class, 'generate']);

    Route::get('/orderby', [CardsController::class, 'orderby']);

    Route::post('/quizcheck', [QuizController::class, 'quizcheck']);
});

require __DIR__ . '/auth.php';
