<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">

            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="{{ route('transactions.create') }}" class="bg-green-500 hover:bg-green-700 btn">
                    Add Transaction</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                @if ($transactions->isEmpty())
                    <p class="p-6 text-gray-600 dark:text-gray-400">
                        {{ __('No transactions yet.') }}
                        <a href="{{ route('transactions.create') }}"
                            class="underline">{{ __('Add your first one.') }}</a>
                    </p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-900/50">
                                <tr
                                    class="text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    <th scope="col" class="px-6 py-3">{{ __('Amount') }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __('Category') }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __('Type') }}</th>
                                    <th scope="col" class="px-6 py-3 ">{{ __('Date') }}</th>
                                    <th scope="col" class="px-6 py-3 ">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody
                                class="divide-y divide-gray-200 dark:divide-gray-700 text-sm text-gray-900 dark:text-gray-100">
                                @foreach ($transactions as $transaction)
                                    @php($isIncome = $transaction->type === 'income')
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap font-medium {{ $isIncome ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $isIncome ? '+' : '-' }}{{ number_format((float) $transaction->amount, 2) }}
                                        </td>
                                        <td class="px-6 py-4 dark:text-black inline-flex">{{ $transaction->category }}
                                        </td>
                                        <td class="px-6 py-4"><span
                                                class="inline-flex rounded-full px-2 py-0.5 text-xs font-semibold {{ $isIncome ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ ucfirst($transaction->type) }}
                                            </span></td>
                                        <td class="px-6 py-4 whitespace-nowrap dark:text-black">
                                            {{ $transaction->date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap space-x-3 ">
                                            <a href="{{ route('transactions.show', ['transaction' => $transaction['id']]) }}"
                                                class="text-blue-800 dark:text-blue-600 hover:underline">View</a>
                                            <a href="{{ route('transactions.edit', ['transaction' => $transaction['id']]) }}"
                                                class="text-blue-800 dark:text-blue-600 hover:underline">Edit</a>
                                            <form method="POST"
                                                action="{{ route('transactions.destroy', $transaction->id) }}"
                                                class="inline" onsubmit="return confirm('Delete this transaction?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 dark:text-red-400 hover:underline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            {{ $transactions->links() }}
        </div>
    </div>
</x-app-layout>
