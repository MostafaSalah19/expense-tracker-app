<?php

namespace App\Http\Controllers;
use App\Models\Transaction;

class TransactionController extends Controller
{
    //

    public function index()
    {
        $transactions = Transaction::all();

        return view('transactions.index', [
            'transactions' => $transactions
        ]);

    }

    public function show($transaction)
    {

        $transaction = ['id' => 1, 'amount' => '25000', 'user_id' => 'mostafa', 'category_id' => 'home', 'descripiton' => 'asfczxca', "date" => '3/2/2026'];

        return view('transactions.show', [
            'transaction' => $transaction
        ]);

    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store()
    {

    return redirect()->route('transactions.index');
    }

}


