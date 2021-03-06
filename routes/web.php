<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CompaniesController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::prefix("admin")->middleware('auth')->group(function () {
    //Route::get('/companies', [CompaniesController::class, "index"])->name("companies");

    Route::resource('companies', CompaniesController::class)->except(['show']);
    Route::resource('clients', ClientsController::class)->except(['show']);
});
