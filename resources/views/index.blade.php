<x-app-layout>

    <x-slot name="title">Заголовок</x-slot>


    <x-slot name="header">
        <h2 > Главная </h2>
    </x-slot>

    <x-items :items="$items"/>

</x-app-layout>
