<x-app-layout>

    <x-slot name="title"> Пользователи </x-slot>


    <x-slot name="header">
        <h2 > Пользователи </h2>
        @foreach ($users as $user)
            <span class="badge bg-primary">{{ $user->name }}</span>
        @endforeach
    </x-slot>


</x-app-layout>
