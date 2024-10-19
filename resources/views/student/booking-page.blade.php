<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Booking Page') }}
        </h2>
    </x-slot>
    <livewire:booking-component />
</x-app-layout>