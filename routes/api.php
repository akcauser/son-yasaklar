<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('items')->group(function () {
    Route::get('', [\App\Http\Controllers\API\APIItemController::class, 'index'])->name('api.items.index');
    Route::post('', [\App\Http\Controllers\API\APIItemController::class, 'store'])->name('api.items.store');
    Route::get('{id}', [\App\Http\Controllers\API\APIItemController::class, 'show'])->name('api.items.show');
    Route::put('{id}', [\App\Http\Controllers\API\APIItemController::class, 'update'])->name('api.items.update');
    Route::delete('{id}', [\App\Http\Controllers\API\APIItemController::class, 'destroy'])->name('api.items.destroy');
});
