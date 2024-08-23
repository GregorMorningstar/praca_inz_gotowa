<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Lista userów') }}
        </h2>

        @include('admin.nav.sidebarAdmin')
    </x-slot>

    <div class="py-2 text-white">
    </div>

    <div class="overflow-x-auto text-black">
        {{ $users->links() }}
        <table class="table-auto w-full border-collapse border border-gray-800">
            <thead>

            <tr>
                <th class="px-4 py-2 bg-gray-200 text-gray-800 border border-gray-600">ID</th>
                <th class="px-4 py-2 bg-gray-200 text-gray-800 border border-gray-600">Name</th>
                <th class="px-4 py-2 bg-gray-200 text-gray-800 border border-gray-600">Email</th>
                <th class="px-4 py-2 bg-gray-200 text-gray-800 border border-gray-600">Role</th>
                <th class="px-4 py-2 bg-gray-200 text-gray-800 border border-gray-600">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="px-4 py-2 border border-gray-600">{{ $user->id }}</td>
                    <td class="px-4 py-2 border border-gray-600">{{ $user->name }}</td>
                    <td class="px-4 py-2 border border-gray-600">{{ $user->email }}</td>
                    <td class="px-4 py-2 border border-gray-600">{{ $user->role }}</td>
                    <td class="px-4 py-2 border border-gray-600 flex justify-between">

                        <a href="{{ route('showDetails', ['id' => $user->id]) }}"
                           class="text-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                           style="width: 50%;">Szczegóły Usera</a>
                        @csrf
                        <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-center bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">Usuń użytkownika</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
         {{ $users->links() }}
    </div>

</x-app-layout>
