@extends('layouts.main')

@section('title', 'Create category')

@section('content')
    <form class="row g-5" style="padding: 10px">
        @csrf
        <div class="col-md-2">
            <label for="name" class="form-label">name</label>
            <input type="name" class="form-control">
        </div>
        <div class="col-md-2">
            <label for="type" class="form-label">type</label>
            <input type="type" class="form-control">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection