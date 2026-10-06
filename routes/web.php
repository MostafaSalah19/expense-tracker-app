<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('transactions/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::post('transactions', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('transactions/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');
Route::get('transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
