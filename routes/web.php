<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminAdditiveController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductAdditiveController;

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
})->name('home');

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

// Маршруты для гостей (доступны только неавторизованным пользователям)
Route::middleware('guest')->group(function () {
    // Регистрация
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Авторизация
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Маршруты для авторизованных пользователей
Route::middleware('auth')->group(function () {
    // Выход из системы
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Профиль пользователя
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Корзина
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

    // Избранное
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

    // Заказы
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
});

// Админские маршруты — доступ только для пользователей с ролью admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // Products CRUD
    Route::get('products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

    // Product Additives
    Route::get('products/{product}/additives', [AdminProductAdditiveController::class, 'edit'])->name('admin.products.additives.edit');
    Route::put('products/{product}/additives', [AdminProductAdditiveController::class, 'update'])->name('admin.products.additives.update');

    // Categories CRUD
    Route::resource('categories', AdminCategoryController::class)->names('admin.categories');

    // Sliders CRUD
    Route::resource('sliders', AdminSliderController::class)->names('admin.sliders');

    // Additives CRUD
    Route::resource('additives', AdminAdditiveController::class)->names('admin.additives');

    // Orders Management
    Route::get('orders', [AdminController::class, 'ordersIndex'])->name('admin.orders.index');
    Route::get('orders/{order}', [AdminController::class, 'orderShow'])->name('admin.orders.show');
    Route::put('orders/{order}/status', [AdminController::class, 'orderUpdateStatus'])->name('admin.orders.update-status');
});