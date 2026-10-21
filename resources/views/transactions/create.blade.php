<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Transactions') }}
        </h2>
    </x-slot>
    <x-guest-layout>
        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf

            <!-- Amount -->
            <div>
                <label for="amount" class="form-label">Amount</label>
                <input class="block mt-1 w-full" type="integer" name="amount">
            </div>

            <!-- Creator -->
            <div class="mt-4">
                <label for="user_id" class="form-label">Created by</label>
                <select class="block mt-1 w-full" name="creator">
                    <option></option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Category -->
            <div class="mt-4">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="block mt-1 w-full" name="category">
            </div>

            <!-- Type -->
            <div class="mt-4">
                <label for="type" class="form-label">type</label>
                <select id="type" class="block mt-1 w-full" name="type">
                    <option></option>
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
