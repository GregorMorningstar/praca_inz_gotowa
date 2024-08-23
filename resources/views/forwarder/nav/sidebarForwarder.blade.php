<div class="mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-start items-center" style="margin-left: 20px;">
        <div class="hidden space-x-8 sm:-my-px sm:flex">
            <x-nav-link :href="route('forwarder.index')" :active="request()->routeIs('forwarder.index')" class="ml-4">
                {{ __('Lista zlecen') }}
            </x-nav-link>
            <x-nav-link :href="route('forwarder.active')" :active="request()->routeIs('forwarder.active')" class="ml-4">
                {{ __('Aktywne zlecenia') }}
            </x-nav-link>
            <x-nav-link :href="route('forwarder.history')" :active="request()->routeIs('forwarder.history')" class="ml-4">
                {{ __('Historia Zlecen') }}
            </x-nav-link>
            <x-nav-link :href="route('forwarder.allocated')" :active="request()->routeIs('forwarder.allocated')" class="ml-4">
                {{ __('Kierowcy z zleceniami') }}
            </x-nav-link>

        </div>
    </div>
</div>
