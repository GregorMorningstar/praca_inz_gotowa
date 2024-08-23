<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Admin Dashboard') }}
        </h2>

        @include('admin.nav.sidebarAdmin')
    </x-slot>

    <div class="py-2 text-white" >
        <h1>Admin page</h1>
    </div>
</x-app-layout>
