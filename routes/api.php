<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\DeliveryPartnerController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\AdminController;
// use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('login', [AuthController::class, 'login'])->name('login');
// Route::middleware('auth:api')->post('logout', [AuthController::class, 'logout'])->name('logout');
// Route::middleware('auth:api')->post('refresh', [AuthController::class, 'refresh'])->name('refresh');
// Route::middleware('auth:api')->get('me', [AuthController::class, 'me'])->name('me');

// Route::controller(AuthController::class)->group(function () {
//     Route::post('logout', 'logout');
//     Route::post('refresh', 'refresh');
//     Route::get('me', 'me');
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});