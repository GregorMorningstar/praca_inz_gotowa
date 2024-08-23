<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Szczegóły użytkowanika') }}
        </h2>

        @include('forwarder.nav.sidebarForwarder')
    </x-slot>
    <div class="container text-white">

        <div class="table-responsive">
            <div class="table-responsive">
                {{ $orders->links() }}

                <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Miejsce Załadunku</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Data Załadunku</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Miejsce Docelowe</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Data Rozładunku</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Dystans</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Status</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Data przyjecia</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Akcje</th>



                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach ($orders as $index => $order)
                            <tr>

                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $order->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $order->miejsce_zaladunku }} </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $order->data_zaladunku }} </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $order->miejsce_docelowe }} </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $order->data_rozladunku }} </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $order->dystans }} </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $order->role }} </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $order->updated_at }} </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                    <a href="{{ route('forwarder.assign', ['id' => $order->id]) }}" class="text-blue-500 hover:text-blue-700">Zobacz szczegóły</a>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>


                    </table>

                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-app-layout>







