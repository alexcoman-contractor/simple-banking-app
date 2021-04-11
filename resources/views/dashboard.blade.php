<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->has('success'))
                        <div class="bg-green-100 mb-5 border-t-4 border-green-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session()->get('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @role('Admin')
                        <a href="{{ route('branch.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white">Create Branch</a>
                        <a href="{{ route('customer.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white">Create Customer</a>
                        <a href="{{ route('report.show') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white">View Reports</a>
                    @endrole
                    <a href="{{ route('transaction.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white">Send Money</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
