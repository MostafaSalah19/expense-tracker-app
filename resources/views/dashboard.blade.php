<x-app-layout>
    @php
        $money = fn ($value) => number_format((float) $value, 2);
        $balance = (float) $totals->balance;
        $periodLabel = $period === 'month' ? now()->format('F Y') : __('All time');
        $tab = fn (bool $active) => $active
            ? 'bg-gray-800 text-white dark:bg-gray-200 dark:text-gray-800'
            : 'bg-white text-gray-700 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700';
    @endphp

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <div class="inline-flex overflow-hidden rounded-md border border-gray-300 dark:border-gray-600 text-sm" role="group" aria-label="{{ __('Period') }}">
                <a href="{{ route('dashboard') }}"
                    @if ($period === 'all') aria-current="true" @endif
                    class="px-3 py-1.5 {{ $tab($period === 'all') }}">{{ __('All time') }}</a>
                <a href="{{ route('dashboard', ['period' => 'month']) }}"
                    @if ($period === 'month') aria-current="true" @endif
                    class="px-3 py-1.5 border-l border-gray-300 dark:border-gray-600 {{ $tab($period === 'month') }}">{{ __('This month') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $periodLabel }}</p>

            <!-- Totals -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Income') }}</p>
                    <p class="mt-2 text-2xl font-semibold text-green-600 dark:text-green-400">{{ $money($totals->income) }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Expenses') }}</p>
                    <p class="mt-2 text-2xl font-semibold text-red-600 dark:text-red-400">{{ $money($totals->expense) }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Balance') }}</p>
                    <p class="mt-2 text-2xl font-semibold {{ $balance < 0 ? 'text-red-600 dark:text-red-400' : 'text-gray-900 dark:text-gray-950' }}">
                        {{ $money($totals->balance) }}
                    </p>
                </div>
            </div>

            <!-- Recent transactions -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-gray-800 dark:text-gray-200">{{ __('Recent transactions') }}</h3>
                    <a href="{{ route('transactions.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">{{ __('View all') }}</a>
                </div>

                @if ($recent->isEmpty())
                    <p class="p-6 text-gray-600 dark:text-gray-400">
                        {{ __('No transactions yet.') }}
                        <a href="{{ route('transactions.create') }}" class="underline">{{ __('Add your first one.') }}</a>
                    </p>
                @else
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($recent as $transaction)
                            @php($isIncome = $transaction->type === 'income')
                            <li>
                                <a href="{{ route('transactions.show', $transaction->id) }}"
                                    class="flex items-center justify-between px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/65">
                                    <span>
                                        <span class="block text-sm font-medium text-gray-900 dark:text-gray-100">{{ $transaction->category }}</span>
                                        <span class="block text-xs text-gray-500 dark:text-gray-400">{{ $transaction->date?->toDateString() }}</span>
                                    </span>
                                    <span class="text-sm font-medium {{ $isIncome ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                        {{ $isIncome ? '+' : '-' }}{{ $money($transaction->amount) }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div>
                <a href="{{ route('transactions.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Add transaction') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>