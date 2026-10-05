@extends('layouts.main')


@section('title', 'Add Transaction')

@section('content')
    <form class="row g-5" style="padding: 10px">
        @csrf
        <div class="col-md-2">
            <label for="inputEmail4" class="form-label">Amount</label>
            <input type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-2">
            <label for="inputPassword4" class="form-label">category</label>
            <input type="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-10">
            <label for="inputAddress" class="form-label">Description</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
