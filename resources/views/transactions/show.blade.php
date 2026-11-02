<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction Details') }}
        </h2>
        <!-- As a link -->
    </x-slot>
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8 space-y-4">

            @php($isIncome = $transaction->type === 'income')
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <dl class="space-y-4 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-gray-500 dark:text-gray-400">{{ __('Category') }}</dt>
                        <dd>{{ $transaction->category }}</dd>
                    </div>

                    <div class="flex justify-between">
                        <dt class="text-gray-500 dark:text-gray-400">{{ __('Type') }}</dt>
                        <dd>
                            <span
                                class="inline-flex rounded-full px-2 py-0.5 text-xs font-semibold {{ $isIncome ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($transaction->type) }}
                            </span>
                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-500 dark:text-gray-400">{{ __('Amount') }}</dt>
                        <dd
                            class="inline-flex rounded-full px-2 py-0.5 text-xs font-semibold {{ $isIncome ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $isIncome ? '+' : '-' }}{{ number_format((float) $transaction->amount, 2) }}
                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-500 dark:text-gray-400">{{ __('Date') }}</dt>
                        <dd>{{ $transaction->date }}</dd>
                    </div>
                </dl>
                <div class="mt-6 flex items-center justify-between">
                    <a href="{{ route('transactions.index') }}"
                        class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 underline">
                        {{ __('Back to transactions') }}
                    </a>
                </div>

            </div>

        </div>

    </div>

</x-app-layout>
