<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('User Dashboard') }}
        </h2>

        @include('user.nav.sidebarUser')
    </x-slot>

    <div class="py-2 bg-white">
        {{ $orders->links() }}
        @if(isset($orders) && !$orders->isEmpty())        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Miejsce zaladunku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data załadunku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Miejsce rozładunku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data rozladuniku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dystans
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aktualna cena
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Firma zlecająca
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Akcje
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$order->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$order->miejsce_zaladunku}}

                    </td>
                    <td class="px-6 py-4">
                        {{$order->data_zaladunku}}

                    </td>
                    <td class="px-6 py-4">
                        {{$order->miejsce_docelowe}}

                    </td>
                    <td class="px-6 py-4">
                        {{$order->data_rozladunku}}

                    </td>
                    <td class="px-6 py-4">
                        {{$order->dystans}}

                    </td>
                    <td class="px-6 py-4">
                        {{$order->cena}}

                    </td>
                    <td class="px-6 py-4">
                        {{$order->user->name}}

                    </td>
                    <td class="px-6 py-4 text-right">
                        {{$order->role}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
            @endif
        </div>

    </div>
</x-app-layout>
