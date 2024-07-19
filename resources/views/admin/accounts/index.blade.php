<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            All Accounts
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">User Accounts</h1>
            <form action="{{ route('admin.accounts.index') }}" method="GET" class="flex space-x-2">
                <input type="text" name="search" placeholder="Search" class="border border-gray-300 p-2 rounded text-gray-800 dark:text-gray-200 dark:bg-gray-700">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-300 dark:border-gray-600">
                <thead>
                    <tr>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">Account Number</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">First Name</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">Last Name</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">Balance</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($accounts as $account)
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">{{ $account->account_number }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">{{ $account->first_name }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">{{ $account->last_name }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-gray-200">{{ $account->balance }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                                <a href="{{ route('admin.accounts.show', $account->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded text-blue-500 underline">View transactions</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-gray-200">No accounts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $accounts->links() }}
        </div>
    </div>
</x-app-layout>
