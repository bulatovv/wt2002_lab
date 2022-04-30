<x-app-layout>

    <x-slot name="title">{{ $item->name }}</x-slot>


    <x-slot name="header">
        <h2 >{{ $item->name }}</h2>
    </x-slot>

    <x-item-full :item="$item"/>

</x-app-layout>
