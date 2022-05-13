<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendshipController;


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

Route::post('/users/{user}/friends', [FriendshipController::class, 'store'])
    ->name('friends.store');
Route::delete('/users/{user}/friends', [FriendshipController::class, 'destroy'])
    ->name('friends.destroy');

require __DIR__.'/auth.php';
