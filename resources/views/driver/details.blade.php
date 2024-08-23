<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Szczegóły zlecenia Drivera') }}
        </h2>

        @include('driver.nav.sidebarDriver')
    </x-slot>
    <div>
        <h1>tutaj beda aktywne zlecenia dla usera o id {{$user_id}}
        </h1>
{{--        {{ dd($order_data) }}--}}

    </div>

</x-app-layout>






















