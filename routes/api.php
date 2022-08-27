<?php

use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\api\auth\logoutController;
use App\Http\Controllers\shoppingController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('shopping', [shoppingController::class, 'index']);
    Route::get('shopping', [shoppingController::class, 'all']);
    Route::get('shopping/{id}', [shoppingController::class, 'show']);
    Route::put('shopping/{id}', [shoppingController::class, 'update']);
    Route::delete('shopping/{id}', [shoppingController::class, 'delete']);
    Route::get('auth/logout', [logoutController::class, 'logout']);
});

Route::post('users/signup', [RegisterController::class, '__invoke']);
Route::get('users', [RegisterController::class, 'all']);
Route::post('users/signin', LoginController::class);
