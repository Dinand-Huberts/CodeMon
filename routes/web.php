<?php

use App\Http\Controllers\BoxController;
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

Route::get('/generate_card', [BoxController::class, 'generate']);

Route::middleware('auth')->group(function () {
    Route::get('/box', [BoxController::class, 'index']);

    Route::get('/quizselector', function () {
        return view('quizselector');
    });

    Route::get('/quiz', function () {
        return view('quiz');
    });

    Route::get('/profile', function () {
        return view('profile');
    });

    Route::get('/cards', function () {
        return view('cards');
    });
});

require __DIR__ . '/auth.php';
