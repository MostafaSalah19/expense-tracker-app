@extends('layouts.main')


@section('title', 'Add Transaction')

@section('content')
    <form class="row g-5" style="padding: 10px" method="Post" action="{{ route('transaction.store') }}">
        @csrf
        <div class="col-md-2">
            <label for="amount" class="form-label">Amount</label>
            <input type="integer" class="form-control" id="amount" name="amount">
        </div>
        <div class="col-md-2">
            <label for="user_id" class="form-label">Created by</label>
            <input type="text" class="form-control" id="user_id" name="user_id">
        </div>
        <div class="col-md-2">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category">
        </div>
        <div class="col-md-2">
            <label for="type" class="form-label">type</label>
            <select id="type" class="form-select">
                <option selected>Open this select menu</option>
                <option value="1">income</option>
                <option value="2">expense</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
