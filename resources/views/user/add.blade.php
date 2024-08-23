<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Dodaj nowe zlecenie') }}
        </h2>

        @include('user.nav.sidebarUser')
    </x-slot>

    <div class="py-2 bg-white" >
        <div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
            <h2 class="text-xl font-semibold mb-4">Dodaj nowe zamówienie</h2>
            <div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
                <h2 class="text-xl font-semibold mb-4">Dodaj nowe zamówienie</h2>
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="miejsce_zaladunku" class="block text-sm font-semibold mb-2">Miejsce załadunku</label>
                        <input type="text" name="miejsce_zaladunku" id="miejsce_zaladunku" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="data_zaladunku" class="block text-sm font-semibold mb-2">Data i godzina załadunku</label>
                        <input type="datetime-local" name="data_zaladunku" id="data_zaladunku" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="miejsce_docelowe" class="block text-sm font-semibold mb-2">Miejsce docelowe</label>
                        <input type="text" name="miejsce_docelowe" id="miejsce_docelowe" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="data_rozladunku" class="block text-sm font-semibold mb-2">Data i godzina rozładunku</label>
                        <input type="datetime-local" name="data_rozladunku" id="data_rozladunku" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="dystans" class="block text-sm font-semibold mb-2">Dystans</label>
                        <input type="number" name="dystans" id="dystans" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="cena" class="block text-sm font-semibold mb-2">Cena za kurs</label>
                        <input type="number" name="cena" id="cena" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Dodaj zamówienie</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</x-app-layout>
