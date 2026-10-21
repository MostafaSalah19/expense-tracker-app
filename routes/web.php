<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__.'/auth.php';

Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index')->middleware('auth');
Route::get('transactions/create', [TransactionController::class, 'create'])->name('transactions.create')->middleware('auth');
Route::post('transactions', [TransactionController::class, 'store'])->name('transactions.store')->middleware('auth');
Route::get('transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show')->middleware('auth');
Route::get('transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit')->middleware('auth');
Route::put('transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update')->middleware('auth');
Route::delete('transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy')->middleware('auth');