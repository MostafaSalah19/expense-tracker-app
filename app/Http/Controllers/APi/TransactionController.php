<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Resources\TransactionResource;
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

    public function show(Request $request, int $id): TransactionResource
    {

        $transaction = $request->user()->transactions()->findOrFail($id);

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

    public function update(UpdateTransactionRequest $request, int $id): TransactionResource
    {
        $transaction = $request->user()->transactions()->findOrFail($id);

        $transaction->update($request->validated());

        return new TransactionResource($transaction);
    }

    public function destroy(Request $request, int $id): Response
    {
        $transaction = $request->user()->transactions()->findOrFail($id);

        $transaction->delete();

        return response()->noContent();
    }
}
