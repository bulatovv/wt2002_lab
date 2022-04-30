<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;

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
    return redirect()->route('items.index');
});

Route::resource('items', ItemController::class);

Route::prefix('trash')->group(function () {
    Route::get('/items', [ItemController::class, 'indexTrashed'])
        ->can('view-trashed')
        ->name('items.trashed');
    Route::post('/items/{id}',  [ItemController::class, 'restore'])
        ->name('items.restore');
    Route::delete('/items/{id}', [ItemController::class, 'forceDelete'])
        ->name('items.forceDelete');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

require __DIR__.'/auth.php';
