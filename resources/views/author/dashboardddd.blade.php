<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Author Dashboard') }}
        </h2>
         @if(Session::has('error'))
        <div class="mb-4 font-medium text-sm text-red-600"> 
        {{session('error')}}
        </div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-jet-welcome /> -->
            </div>
        </div>
    </div>
</x-app-layout>