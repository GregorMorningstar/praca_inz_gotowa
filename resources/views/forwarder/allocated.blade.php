<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Przydzielone trasy') }}
        </h2>

        @include('forwarder.nav.sidebarForwarder')
    </x-slot>
    <div>
{{$allocated->links()}}
        <table class="min-w-full leading-normal">
            <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Numer zlecenia
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Miejsce załadunku
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Miejsce docelowe
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Status załadunku
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Status rozładunku
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Kierowca
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($allocated as $allocation)
                <tr>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $allocation->order->id }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $allocation->order->miejsce_zaladunku }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $allocation->order->miejsce_docelowe }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        @if($allocation->przyjazd_dostawa)
                            <span class="text-blue-800 font-extrabold">Kierowca przybył na miejsce załadunku o {{ $allocation->przyjazd_dostawa }}</span>
                        @else
                            <span class="text-red-500">Kierowca jeszcze nie przyjechał na miejsce</span>
                        @endif
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        @if($allocation->przyjazd_dostawa)
                            <span class="text-blue-700 font-extrabold">Kierowca przybył na miejsce dostawy o {{ $allocation->przyjazd_dostawa }}</span>
                        @else
                            <span class="text-red-500">Kierowca jeszcze nie przyjechał na miejsce</span>
                        @endif
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $allocation->user->name }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{$allocated->links()}}

    </div>
</x-app-layout>
