<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreTransactionRequest;
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

    public function show(Transaction $transaction)
    {


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

    public function store(StoreTransactionRequest $myRequestObject)
    {
        //1- get the user data
        
        $data = $myRequestObject->all();
        // $data = request()->all();

        // validate the data
    
        // $data =  $myRequestObject->validate([
        //     'Creator'  => ['required', 'exists:users,id'],
        //     'Amount'   => ['required', 'integer', 'min:1'],
        //     'Category' => ['required', 'string', 'max:255'],
        //     'Type'     => ['required', 'in:income,expense'],
        //  ]);

        //2- store the submitted data in database

        // Transaction::create([
        //     'amount' => $data['amount'],
        //     'user_id' => $data['user'],
        //     'category_id' => $data['category'],
        //     'description' => $data['description'],
        // ]);

        // Transaction::create($myRequestObject->all());

        Transaction::create($data);

        // $transaction = new Transaction;
        // $transaction->amount = $data['amount'];
        // $transaction->user_id = $data['user_id'];
        // $transaction->category = $data['category'];
        // $transaction->save();

        return redirect()->route('transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        $users= User::all();

        return view('transactions.edit', [
            'users' => $users,
            'transaction' => $transaction
        ]);
    }

    public function update($transactionId)
    {
        $amount = request()->amount;
        $userId = request()->user_id;
        $category = request()->category;
        // dd($amount, $userId, $category);

        $singleTransactionFromDB = Transaction::findOrFail($transactionId);
        $singleTransactionFromDB->update([
            'amount' => $amount,
            'user_id' => $userId,
            'category' => $category,
        ]);

        return redirect()->route('transactions.show', $transactionId);
    }
}


