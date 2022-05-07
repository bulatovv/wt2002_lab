<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;


Route::resource('items', ItemController::class);

Route::redirect('/', route('items.index'));

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
