<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Szczegóły użytkowanika') }}
        </h2>

        @include('forwarder.nav.sidebarForwarder')
    </x-slot>
    <div>


        <div class="container m-2 ">
            <div class="overflow-x-auto">
                <table class="table-auto border-collapse w-full">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">Miejsce załadunku</th>
                        <th class="px-4 py-2">Data załadunku</th>
                        <th class="px-4 py-2">Miejsce Dostawy</th>
                        <th class="px-4 py-2">Czas Dostawy</th>
                        <th class="px-4 py-2">Dystans</th>
                    </tr>
                    </thead>
                    <tbody class="text-center text-white">
                    <tr>
                        <td class="border px-4 py-2">{{$myOrder->miejsce_zaladunku}}</td>
                        <td class="border px-4 py-2">{{$myOrder->data_zaladunku}}</td>
                        <td class="border px-4 py-2">{{$myOrder->miejsce_docelowe}}</td>
                        <td class="border px-4 py-2">{{$myOrder->data_rozladunku}}</td>
                        <td class="border px-4 py-2">{{$myOrder->dystans}}</td>
                    </tr>
                                     </tbody>
                </table>
            </div>

        </div>
        <div class="flex justify-center">
            <div class="max-w-md w-full">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <form action="{{ route('activeOrdersDriver', ['id' => $myOrder->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $myOrder->id }}">
                        <div class="relative">
                            <select name="driver_id" class="form-select block w-full appearance-none border border-gray-300 bg-white py-3 px-4 pr-8 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-3 w-full rounded-md focus:outline-none focus:shadow-outline">Wybierz kierowcę</button>
                    </form>
                </div>
            </div>
        </div>



    </div>
</x-app-layout>
