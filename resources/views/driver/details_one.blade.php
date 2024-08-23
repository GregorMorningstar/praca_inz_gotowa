<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Szczegóły zlecenia Drivera') }}
        </h2>

        @include('driver.nav.sidebarDriver')
    </x-slot>
    <div class="text-center">
        @if(session()->has('error'))
            <p id="error-message" class="alert alert-danger text-red-700 bg-pink-200 rounded-lg py-2 px-4 inline-block">
                {{ session('error') }}
            </p>
        @endif
    </div>
    <div class="text-center">
        @if(session()->has('success'))
            <p id="error-message" class="alert alert-danger text-red-700 bg-pink-200 rounded-lg py-2 px-4 inline-block">
                {{ session('success') }}
            </p>
        @endif
    </div>
    {{--{{dd($orderData)}}--}}
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


        </tr>
        </thead>
        <tbody>

        <tr>
            <td class="px-2 py-1 border-b border-gray-200 bg-white text-sm">
                {{$orderData->order_id}}
            </td>
            <td class="px-2 py-1 border-b border-gray-200 bg-white text-sm">
                {{$orderData->order->miejsce_zaladunku}}
            </td>
            <td class="px-2 py-1 border-b border-gray-200 bg-white text-sm flex">

                <form method="POST" action="{{ route('driver.changeStatus') }}">
                    @csrf
                    <input type="hidden" name="loading_Status" value="{{ $orderData->order_id }}">
                    <input type="hidden" name="order_id" value="{{ $orderData->order_id }}">

                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Zaznacz
                        zaladunek
                    </button>
                </form>
                @if($orderData->przyjazd_zaladunek)

                <form method="POST" action="{{ route('driver.changeStatus') }}">
                    @csrf
                    <input type="hidden" name="loading_Status_finish" value="{{ $orderData->order_id }}">
                    <input type="hidden" name="order_id" value="{{ $orderData->order_id }}">

                    <button type="submit"
                            class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-full">Zaznacz
                       koniec zaladunek
                    </button>
                </form>
                @endif

            </td>
            <td class="px-2 py-1 border-b border-gray-200 bg-white text-sm">
                {{$orderData->order->miejsce_docelowe}}
            </td>
            <td class="px-2 py-1 border-b border-gray-200 bg-white text-sm flex">
                @if($orderData->odjazd_zaladunek)

                <form method="POST" action="{{ route('driver.changeStatus') }}">
                    @csrf
                    <input type="hidden" name="unloading_Status" value="{{ $orderData->order_id }}">
                    <input type="hidden" name="order_id" value="{{ $orderData->order_id }}">

                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Zaznacz
                        rozladunek
                    </button>
                </form>
                @endif
                    @if($orderData->przyjazd_dostawa)

                    <form method="POST" action="{{ route('driver.changeStatus') }}">
                    @csrf
                    <input type="hidden" name="unloading_Status_finish" value="{{ $orderData->order_id }}">
                    <input type="hidden" name="order_id" value="{{ $orderData->order_id }}">

                    <button type="submit"
                            class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-full">Zaznacz
                     koniec   rozladunek
                    </button>
                </form>
                    @endif
            </td>

        </tr>

        </tbody>
    </table>

    <div class="bg-white shadow-md rounded-lg p-4">
        @if($orderData->przyjazd_zaladunek)
            <div class="text-white bg-green-500 rounded-md px-4 py-2 mb-2">Dojechałeś na przyjazd_zaladunek {{$orderData->przyjazd_zaladunek}}</div>
        @endif

        @if($orderData->odjazd_zaladunek)
            <div class="text-white bg-green-500 rounded-md px-4 py-2 mb-2">Dojechałeś na odjazd_zaladunek {{$orderData->odjazd_zaladunek}}</div>
        @endif

        @if($orderData->przyjazd_dostawa)
            <div class="text-white bg-green-500 rounded-md px-4 py-2 mb-2">Dojechałeś na przyjazd_dostawa {{$orderData->przyjazd_dostawa}}</div>
        @endif

        @if($orderData->odjazd_dostawa)
            <div class="text-white bg-green-500 rounded-md px-4 py-2 mb-2">Dojechałeś na odjazd_dostawa {{$orderData->odjazd_dostawa}}</div>
        @endif
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
