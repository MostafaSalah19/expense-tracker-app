<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Transactions') }}
        </h2>
        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="{{ route('transactions.create') }}" class="bg-green-500 hover:bg-green-700 btn">Add Transaction</a>
        </div>

        <table class="table-auto container mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Added By</th>
                    <th scope="col">Category</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                    <th class="centre">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $transaction->id }}</th>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->user ? $transaction->user->name : 'user not found' }}</td>
                        <td>{{ $transaction->category }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->date }}</td>
                        <td class="col">
                            <a href="{{ route('transactions.show', ['transaction' => $transaction['id']]) }}"
                                class="bg-sky-500 hover:bg-sky-700 btn ">View</a>
                            <a href="{{ route('transactions.edit', ['transaction' => $transaction['id']]) }}"
                                class="bg-yellow-500 hover:bg-yellow-700 btn">Edit</a>
                            <form style="display: inline;" method="POST"
                                action="{{ route('transactions.destroy', $transaction->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $transactions->links() }}
    </x-slot>
</x-app-layout>
