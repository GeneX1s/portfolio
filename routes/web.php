<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\BalanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

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
    return view('/public/portfolio1');
})->name('portfolio1');

Route::get('/portfolio2', function () {
    return view('/public/portfolio2');
})->name('portfolio2');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/dashboard/users/manage', [LoginController::class, 'manage'])->name('manage')->middleware('auth');
//name('login') wajib biar gk error klo blom login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/dashboard/users/update', [LoginController::class, 'update'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']); //untuk simpen data yg diregister


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/features', function () {
    return view('/dashboard/features');
})->name('features');

Route::get('/portfolio1', function () {
    return view('/public/portfolio1');
})->name('portfolio1');

////////////////Transactions////////////////
Route::get('/dashboard/transactions/export-pdf', [TransactionController::class, 'exportPDF']);
Route::get('/dashboard/transactions/index', [TransactionController::class, 'index'])->middleware('auth');
Route::get('/dashboard/transactions/create', [TransactionController::class, 'create'])->middleware('auth');
Route::get('/dashboard/setvalue', [TransactionController::class, 'view_setvalue'])->middleware('auth');
Route::resource('/dashboard/transactions', TransactionController::class)->middleware('auth');
Route::post('/dashboard/transactions/{transaction}/template', [TransactionController::class, 'template_add'])->middleware('auth');
Route::post('/dashboard/transactions/template', [TransactionController::class, 'template'])->middleware('auth');
Route::post('/dashboard/transactions/setvalue', [TransactionController::class, 'setvalue'])->middleware('auth');
Route::post('/dashboard/clear/transactions', [TransactionController::class, 'clear'])->middleware('auth');


////////////////////////////////////

////////////////Users////////////////
Route::get('/dashboard/users/index', [LoginController::class, 'list'])->middleware('auth');
Route::get('/dashboard/users/edit', [LoginController::class, 'edit'])->middleware('auth');
Route::get('/dashboard/users/create', [LoginController::class, 'create'])->middleware('auth');
Route::get('/dashboard/users/{user:id}/edit', [LoginController::class, 'update'])->middleware('auth');
Route::resource('/dashboard/users', LoginController::class)->middleware('auth');
////////////////////////////////////

////////////////Balances////////////////
Route::get('/dashboard/balances/index', [BalanceController::class, 'index'])->middleware('auth');
Route::get('/dashboard/balances/edit', [BalanceController::class, 'edit'])->middleware('auth');
Route::get('/dashboard/balances/create', [BalanceController::class, 'create'])->middleware('auth');
Route::get('/dashboard/balances/move', [BalanceController::class, 'move'])->middleware('auth');
Route::post('/dashboard/balances/transfer', [BalanceController::class, 'transfer'])->middleware('auth');
Route::get('/dashboard/balances/{balance:id}/edit', [BalanceController::class, 'update'])->middleware('auth');
Route::get('/dashboard/balances/{balance:id}/history', [BalanceController::class, 'history'])->middleware('auth');
Route::resource('/dashboard/balances', BalanceController::class)->middleware('auth');
////////////////////////////////////

////////////////Assets////////////////
Route::get('/dashboard/assets/index', [AssetController::class, 'index'])->middleware('auth');
Route::get('/dashboard/assets/edit', [AssetController::class, 'edit'])->middleware('auth');
Route::get('/dashboard/assets/create', [AssetController::class, 'create'])->middleware('auth');
Route::get('/dashboard/assets/{asset:id}/edit', [AssetController::class, 'update'])->middleware('auth');
Route::resource('/dashboard/assets', AssetController::class)->middleware('auth');
////////////////////////////////////



// Route::get('/export-users', [ExportController::class, 'exportUsers']);
