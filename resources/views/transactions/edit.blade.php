<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Transaction') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('transactions.update', $transaction) }}">
                    @csrf
                    @method('PUT')
                    <!-- Amount -->
                    <div>
                        <x-input-label for="amount" :value="__('Amount')" />
                        <x-text-input id="amount" name="amount" type="number" min="0.01" step="0.01"
                            class="block mt-1 w-full" :value="old('amount', $transaction?->amount)" required autofocus />
                    </div>

                    <!-- Category -->
                    <div>
                        <x-input-label for="category" :value="__('Category')" />
                        <x-text-input id="category" name="category" type="text" class="block mt-1 w-full"
                            :value="old('category', $transaction?->category)" required />
                    </div>

                    <!-- Type -->
                    <div>
                        <x-input-label for="type" :value="__('Type')" />
                        <select id="type" name="type" required
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="" disabled @selected(!old('type', $transaction?->type))>{{ __('Choose a type') }}
                            </option>
                            <option value="income" @selected(old('type', $transaction?->type) === 'income')>{{ __('Income') }}</option>
                            <option value="expense" @selected(old('type', $transaction?->type) === 'expense')>{{ __('Expense') }}</option>
                        </select>

                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <a href="{{ route('transactions.index') }}"
                            class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 underline">
                            {{ __('Cancel') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Save Changes') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
