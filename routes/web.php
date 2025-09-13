<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Маршрут для главной страницы
Route::get('/', function () {
    return view('index');
});

// Маршрут для страницы "О нас"
Route::get('/about', function () {
    return view('about');
});

// Маршрут для страницы "Блог"
Route::get('/blog', function () {
    return view('blog');
});

// Маршрут для страницы "Магазин"
Route::get('/shop', function () {
    return view('shop');
});

// Маршрут для страницы "Меню", использует MenuController
Route::get('/menu', [MenuController::class, 'index']);

// Маршруты для страницы "Контакты", которые используют ContactController
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');