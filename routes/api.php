<?php

use App\Http\Controllers\Api\TransactionController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name('api.')->middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('transactions', TransactionController::class);
});

// Route::get('transactions', [TransactionController::class, "index"])->middleware('auth:sanctum');
// Route::get('transactions/{transaction}', [TransactionController::class, "show"])->middleware('auth:sanctum');
// Route::post('transactions', [TransactionController::class, 'store'])->middleware('auth:sanctum');

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});
