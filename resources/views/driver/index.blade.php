<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Szczegóły Drivera') }}
        </h2>

        @include('driver.nav.sidebarDriver')
    </x-slot>

    <div>
        <table class="min-w-full leading-normal">
            <thead>
            <tr>
                <th class="px-2 py-1 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Numer zlecenia
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Miejsce załadunku
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Data załądunki
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Miejsce docelowe
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Data Dostawy
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Status przyjazdu
                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($order_data as $allocation)
                <tr>
                    <td class="px-2 py-1 border-b border-gray-200 bg-white text-sm">
                        {{ $allocation->order->id }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $allocation->order->miejsce_zaladunku }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $allocation->order->data_zaladunku }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $allocation->order->miejsce_docelowe }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $allocation->order->data_rozladunku }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        <a href="{{ route('driver.details_one', ['id' => $allocation->order->id]) }}">Przejdź do Zlecenia</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{--    {{ dd($order_data) }}--}}

    </div>
</x-app-layout>
