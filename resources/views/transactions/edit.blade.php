@extends('layouts.main')

@section('title', 'Edit Transaction')

@section('content')
    <form class="row g-5" style="padding: 10px" method="POST" action="{{route('transactions.update', $transaction->id)}}">
        @csrf
        @method('PUT')
        <div class="col-md-2">
            <label for="amount" class="form-label">Amount</label>
            <input type="integer" class="form-control" id="amount" name="amount">
        </div>
        <div class="col-md-2">
            <label for="user_id" class="form-label">Created by</label>
            <select class="form-select" name="user_id">
                <option selected>Open this select menu</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category">
        </div>
        <div class="col-md-2">
            <label for="type" class="form-label">type</label>
            <select id="type" class="form-select" name="tyoe">
                <option selected>Open this select menu</option>
                <option value="1">income</option>
                <option value="2">expense</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection