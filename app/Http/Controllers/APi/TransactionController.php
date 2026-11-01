<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $transactions = $request->user()
            ->transactions()
            ->with('user')
            ->latest('date')
            ->latest('id')
            ->paginate(15);

        return TransactionResource::collection($transactions);
    }

    public function show(Request $request, Transaction $transaction): TransactionResource
    {

        $transaction = $request->user()->transactions()->findOrFail($transaction);

        return new TransactionResource($transaction);
    }

    public function store(StoreTransactionRequest $request): JsonResponse
    {
        $transaction = $request->user()
            ->transactions()
            ->create($request->validated());

        return (new TransactionResource($transaction->refresh()))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction): TransactionResource
    {
        $transaction = $request->user()->transactions()->findOrFail($transaction);

        $transaction->update($request->validated());

        return new TransactionResource($transaction);
    }

    public function destroy(Request $request, Transaction $transaction): Response
    {
        $transaction = $request->user()->transactions()->findOrFail($transaction);

        $transaction->delete();

        return response()->noContent();
    }
}
