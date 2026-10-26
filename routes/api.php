<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APi\TransactionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('transactions', [TransactionController::class, "index"]);
Route::get('transactions/{transction}', [TransactionController::class, "show"]);