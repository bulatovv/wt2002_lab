<x-app-layout>

    <x-slot name="title"> Пользователи </x-slot>


    <x-slot name="header">
        <h2 > Пользователи </h2>
    </x-slot>

    @foreach ($users as $user)
        <a href="{{ route('users.show', [$user->name]) }}" class="badge bg-primary">{{ $user->name }}</a>
    @endforeach

</x-app-layout>
