<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Szczegóły Drivera') }}
        </h2>

        @include('driver.nav.sidebarDriver')
    </x-slot>
    <div class="text-center">
        @if(session()->has('success'))
            <p id="error-message" class="alert alert-danger text-red-700 bg-pink-200 rounded-lg py-2 px-4 inline-block">
                {{ session('success') }}
            </p>
        @endif
    </div>
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
                    Rzeczywista data dostawy
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
                        {{ $allocation->odjazd_dostawa }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{--    {{ dd($order_data) }}--}}

    </div>
</x-app-layout>

<script>
    setTimeout(function() {
        document.getElementById('error-message').style.display = 'none';
    }, 5000); // 5000 milisekund = 5 sekund
    setTimeout(function() {
        document.getElementById('success').style.display = 'none';
    }, 5000); // 5000 milisekund = 5 sekund

</script>
