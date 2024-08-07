<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [IndexController::class, 'index']);


Route::get('/portfolio1', function () {
    return view('portfolio1');
})->name('portfolio1');

Route::get('/portfolio2', function () {
    return view('portfolio2');
})->name('portfolio2');

Route::get('/inner-page', function () {
    return view('inner-page');
})->name("inner-page");


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
//name('login') wajib biar gk error klo blom login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']); //untuk simpen data yg diregister

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->name("dashboard");


// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

////////////////Transactions/////////
Route::get('/dashboard/transactions/index', [TransactionController::class, 'index'])->middleware('auth');
Route::get('/dashboard/transactions/create', [TransactionController::class, 'create'])->middleware('auth');
Route::resource('/dashboard/transactions', TransactionController::class)->middleware('auth');
Route::post('/dashboard/transactions/{transaction}/template', [TransactionController::class, 'template_add'])->middleware('auth');
Route::post('/dashboard/transactions/template', [TransactionController::class, 'template'])->middleware('auth');
////////////////////////////////////

////////////////Orders/////////
Route::get('/dashboard/orders/index', [OrderController::class, 'index'])->middleware('auth');
Route::get('/dashboard/orders/create', [OrderController::class, 'create'])->middleware('auth');
Route::resource('/dashboard/orders', OrderController::class)->middleware('auth');
Route::post('/dashboard/orders/changeStatus/{order:id}', [OrderController::class, 'changeStatus'])->middleware('auth');
////////////////////////////////////
