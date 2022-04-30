<x-app-layout>

    <x-slot name="title">{{ $user->name }}</x-slot>


    <x-slot name="header">
        <h2 > {{ $user->name }} </h2>
    </x-slot>

    <x-items :items="$user->items"/>

</x-app-layout>
