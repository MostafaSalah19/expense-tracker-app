<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransactionController extends Controller
{
    public function index(Request $request): View
    {
        $transactions = $request->user()
            ->transactions()
            ->with('user')
            ->latest('date')
            ->latest('id')
            ->paginate(10);

        return view('transactions.index', [
            'transactions' => $transactions,
        ]);
    }

    public function show(Request $request, int $id): View
    {

        $transaction = $request->user()->transactions()->findOrFail($id);

        return view('transactions.show', [
            'transaction' => $transaction,
        ]);
    }

    public function create(): View
    {
        return view('transactions.create');
    }

    public function store(StoreTransactionRequest $request)
    {
        $request->user()->transactions()->create($request->validated());

        return redirect()->route('transactions.index');
    }

    public function edit(Request $request, int $id): View
    {

        $transaction = $request->user()->transactions()->findOrFail($id);

        return view('transactions.edit', [
            'transaction' => $transaction,
        ]);
    }

    public function update(UpdateTransactionRequest $request, int $id)
    {

        $transaction = $request->user()->transactions()->findOrFail($id);

        $transaction->update($request->validated());

        return redirect()->route('transactions.show', $transaction);
    }

    public function destroy(Request $request, int $id)
    {
        $request->user()->transactions()->findOrFail($id)->delete();

        return redirect()->route('transactions.index');
    }
}
