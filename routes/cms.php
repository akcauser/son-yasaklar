<?php

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

Route::get('', function () {
    return view('cms.index');
})->name('cms.index')->middleware(['auth', 'role:Super Admin']);

Route::prefix('items')->middleware(['auth', 'role:Super Admin'])->group(function () {
    Route::get('', [App\Http\Controllers\CMS\CMSItemController::class, 'index'])->name('cms.items.index');
    Route::get('create', [App\Http\Controllers\CMS\CMSItemController::class, 'create'])->name('cms.items.create');
    Route::get('{id}', [App\Http\Controllers\CMS\CMSItemController::class, 'show'])->name('cms.items.show');
    Route::post('', [App\Http\Controllers\CMS\CMSItemController::class, 'store'])->name('cms.items.store');
    Route::get('{id}/edit', [App\Http\Controllers\CMS\CMSItemController::class, 'edit'])->name('cms.items.edit');
    Route::put('{id}', [App\Http\Controllers\CMS\CMSItemController::class, 'update'])->name('cms.items.update');
    Route::delete('{id}', [App\Http\Controllers\CMS\CMSItemController::class, 'delete'])->name('cms.items.destroy');
});
