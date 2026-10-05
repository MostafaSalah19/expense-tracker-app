@extends('layouts.main')

@section('title', 'Expense Tracker')

@section('content')
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Transactions</a>
            <a class="btn btn-info me-md-2" href="{{route('categories.index')}}">categories</a>
        </div>
        
    </nav>

    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="{{ route('transaction.create') }}" class="btn btn-success">Add Transaction</a>
    </div>
    <table class="table table-success table-striped container mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Amount</th>
                <th scope="col">Created By</th>
                <th scope="col">Category</th>
                <th scope="col">Descrption</th>
                <th scope="col">Date</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <th scope="row">{{ $transaction['id'] }}</th>
                    <td>{{ $transaction['amount'] }}</td>
                    <td>{{ $transaction['user_id'] }}</td>
                    <td>{{ $transaction['category_id'] }}</td>
                    <td>{{ $transaction['descripiton'] }}</td>
                    <td>{{ $transaction['date'] }}</td>
                    <td class="col">
                        <a href="{{ route('transaction.show', ['transaction' => $transaction['id']]) }}"
                            class="btn btn-primary">View</a>


                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>

@endsection
