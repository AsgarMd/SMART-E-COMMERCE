<x-app-layout>
    <x-slot name="header">
        <h5 class="font-semibold text-sm text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h5>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-sm">
                <x-jet-welcome />
            </div>
        </div>
    </div>
    <x-app-layout>
