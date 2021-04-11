<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Show all branches along with the highest balance at each branch. A branch with no customers should show 0 as the highest balance.</h3>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Sum</th>
                        </tr>
                        @foreach ($firstReport as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->sum }}</td>
                            </tr>
                        @endforeach
                    </table>

                    <hr class="my-2">

                    <h3>List just those branches that have more than two customers with a balance over 50,000.</h3>
                    <table>
                        <tr>
                            <th>Name</th>
                        </tr>
                        @foreach ($secondReport as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
