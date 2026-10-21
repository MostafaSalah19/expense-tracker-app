<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Transaction') }}
        </h2>
    </x-slot>
    <x-guest-layout>
        <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
            @csrf
            @method('PUT')

            <!-- Amount -->
            <div>
                <label for="amount" class="form-label">Amount</label>
                <input type="integer" class="block mt-1 w-full" name="amount" value="{{ $transaction->amount }}">
            </div>

            <!-- Category -->
            <div class="mt-4">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="block mt-1 w-full" name="category" value="{{ $transaction->category }}">
            </div>

            <!-- Type -->
            <div class="mt-4">
                <label for="type" class="form-label">type</label>
                <select id="type" class="block mt-1 w-full" name="type" value="{{ $transaction->type }}">
                    <option value="income">income</option>
                    <option value="expense">expense</option>
                </select>

            </div>

            <div class="flex items-center justify-end mt-4">
                

                <x-primary-button class="ms-4">
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</x-app-layout>
