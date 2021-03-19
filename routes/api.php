<?php

use App\Http\Controllers\API\ClientsController;
use App\Http\Controllers\API\ClientsRelationsController;
use App\Http\Controllers\API\CompaniesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group( function () {
    Route::post('/get_companies', [CompaniesController::class, 'index']);
    Route::post('/get_clients/{company_id}', [ClientsController::class, 'getByCompany'])
        ->where('company_id', '[0-9]+');
    Route::post('/get_client_companies/{client_id}', [ClientsRelationsController::class, 'getCompanyByClient'])
        ->where('client_id', '[0-9]+');
});
