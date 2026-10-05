<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //

    public function index()
    {
        $transactions = [
            ['id' => 1, 'amount' => '25000', 'user_id' => 'mostafa', 'category_id' => 'home', 'descripiton' => 'asfczxca', "date" => '3/2/2026'],
            ['id' => 2, 'amount' => '3000', 'user_id' => 'hassan', 'category_id' => 'work', 'descripiton' => 'xjjhgfhgfbvnbn', "date" => '30/5/2026']
        ];

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

        return view('transactions.createf');
    }
}
