@extends('layouts.main')

@section('title', 'Categories')


@section('content')
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('transactions.index') }}">All Transactions</a>
        </div>

    </nav>

    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
    </div>
    <table class="table table-success table-striped container mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Created By</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category['id'] }}</th>
                    <td>{{ $category['user_id'] }}</td>
                    <td>{{ $category['name'] }}</td>
                    <td>{{ $category['type'] }}</td>
                    <td class="col">
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
