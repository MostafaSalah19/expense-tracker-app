@extends('layouts.main')


@section('title', 'Add Transaction')

@section('content')
    <form class="row g-5" style="padding: 10px" method="Post" action="{{ route('transactions.store') }}">
        @csrf
        <div class="col-md-2">
            <label for="amount" class="form-label">Amount</label>
            <input type="integer" class="form-control"  name="Amount">
        </div>
        <div class="col-md-2">
            <label for="user_id" class="form-label">Created by</label>
            <select class="form-select" name="Creator">
                <option></option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" name="Category">
        </div>
        <div class="col-md-2">
            <label for="type" class="form-label">type</label>
            <select id="type" class="form-select" name="Type">
                <option ></option>
                <option value="income">income</option>
                <option value="expense">expense</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
