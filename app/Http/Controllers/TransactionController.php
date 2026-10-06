<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

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

        $transaction = Transaction::find($transaction);

        return view('transactions.show', [
            'transaction' => $transaction
        ]);

    }

    public function create()
    {
        $users = User::all();
        return view('transactions.create', [
            'users' => $users
        ]);
    }

    public function store(Request $myRequestObject)
    {
        $data = $myRequestObject->all();

        // $data = request()->all();

        // Transaction::create([
        //     'amount' => $data['amount'],
        //     'user_id' => $data['user'],
        //     'category_id' => $data['category'],
        //     'description' => $data['description'],
        // ]);

        // Transaction::create($myRequestObject->all());

        // Transaction::create($data);

        $transaction = new Transaction;
        $transaction->amount = $data['amount'];
        $transaction->user_id = $data['user_id'];
        $transaction->category = $data['category'];
        $transaction->save();



        return redirect()->route('transactions.index');
    }

}


