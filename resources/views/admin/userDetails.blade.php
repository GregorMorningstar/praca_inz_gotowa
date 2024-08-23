<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Szczegóły użytkowanika') }}
        </h2>

        @include('admin.nav.sidebarAdmin')
    </x-slot>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-semibold leading-6 text-gray-900">Informacje o użytkowniku {{$user->name}}</h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">ID</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $user['id'] }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $user['email'] }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Rola</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                        <!-- Formularz do zmiany roli -->
                        <form action="{{ route('updateUserRole', $user->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <select name="role" class="form-control">
                                @foreach (\App\Enum\UserRoles::TYPEROLES as $role)
                                    <option value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">Zmień rolę</button>
                        </form>
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Data utworzenia konta</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $user['created_at'] }}</dd>
                </div>
            </dl>
        </div>
    </div>

</x-app-layout>






















