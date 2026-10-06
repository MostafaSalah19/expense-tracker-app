@extends('layouts.main')

@section('title', 'Transaction Details')

@section('content')
<!-- As a link -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('transactions.index') }}">All Transactions</a>
        </div>
    </nav>
    <div class="card">
        <div class="card-header">
            Transaction Details
        </div> 
        <div class="card-body">
            <h5 class="card-title">{{ $transaction->category }}</h5>
            <p class="card-text">type: {{ $transaction->type }}</p>
            <p class="card-text">Amount: {{ $transaction->amount }}</p>
            <p class="card-text">Created By: {{ $transaction->user->name }}</p>
            <p class="card-text">Date: {{ $transaction->date }}</p>
        </div>
    </div>

@endsection
