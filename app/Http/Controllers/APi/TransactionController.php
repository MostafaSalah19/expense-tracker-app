<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
    public function index(){

    $transactions = Transaction::all();

    return TransactionResource::collection($transactions);
    }

    public function show(int $id){
        $transactions = Transaction::find($id);

        return new TransactionResource($transactions);
    }
}
