<x-app-layout>

    <x-slot name="title">{{ $user->name }}</x-slot>


    <x-slot name="header">
        <h2 > {{ $user->name }} </h2>
    </x-slot>

    @can('view-trashed')
        <x-items :items="$user->trashedItems->merge($user->items)"/>
    @else
        <x-items :items="$user->items"/>
    @endcan
</x-app-layout>
