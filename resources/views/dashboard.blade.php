<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
           Create Multiple Savings Accounts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Display validation errors --}}
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 border border-red-300 rounded-md p-4 mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form to create multiple accounts --}}
                    <form id="accounts-form" action="{{ route('admin.accounts.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div id="accounts-container">
                            {{-- Initial account fields --}}
                            <div class="account-fields border p-4 rounded-md mb-4">
                                <h3 class="text-lg font-semibold mb-2">Account 1</h3>

                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div class="form-group">
                                        <label for="first_name_0" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                                        <input type="text" name="accounts[0][first_name]" id="first_name_0" class="dark:text-gray-500 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('accounts.0.first_name') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name_0" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                                        <input type="text" name="accounts[0][last_name]" id="last_name_0" class="dark:text-gray-500 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('accounts.0.last_name') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="dob_0" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date of Birth</label>
                                        <input type="date" name="accounts[0][dob]" id="dob_0" class="dark:text-gray-500 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('accounts.0.dob') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="address_0" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                                        <textarea name="accounts[0][address]" id="address_0" rows="3" class="dark:text-gray-500 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('accounts.0.address') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="add-account" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Add Another Account
                        </button>

                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create Accounts
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Include jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let accountIndex = 1; // Start with the next index

            $('#add-account').click(function() {
                const newAccountFields = `
                    <div class="account-fields border p-4 rounded-md mb-4">
                        <h3 class="text-lg font-semibold mb-2">Account ${accountIndex + 1}</h3>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="form-group">
                                <label for="first_name_${accountIndex}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                                <input type="text" name="accounts[${accountIndex}][first_name]" id="first_name_${accountIndex}" class="dark:text-gray-500  text-dark-900 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name_${accountIndex}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                                <input type="text" name="accounts[${accountIndex}][last_name]" id="last_name_${accountIndex}" class="dark:text-gray-500  mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <div class="form-group">
                                <label for="dob_${accountIndex}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date of Birth</label>
                                <input type="date" name="accounts[${accountIndex}][dob]" id="dob_${accountIndex}" class="dark:text-gray-500  mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <div class="form-group">
                                <label for="address_${accountIndex}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                                <textarea name="accounts[${accountIndex}][address]" id="address_${accountIndex}" rows="3" class="dark:text-gray-500  mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                            </div>
                        </div>
                    </div>
                `;

                $('#accounts-container').append(newAccountFields);
                accountIndex++;
            });
        });
    </script>
</x-app-layout>
