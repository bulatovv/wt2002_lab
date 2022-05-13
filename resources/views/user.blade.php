<x-app-layout>

    <x-slot name="title">{{ $user->name }}</x-slot>


    <x-slot name="header">
        <div class="d-flex gap-3">
            <h2> {{ $user->name }} </h2>

            @auth @if(Auth::user()->isNot($user)) 
                @if ($user->friendTo(Auth::user()))
                    <form action={{ route('friends.destroy', [Auth::user()]) }} method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="user_id" value={{ $user->id }}>
                        <input type="submit" class="btn btn-danger" value="Удалить из друзей">
                    </form>
                @else
                    <form action={{ route('friends.store', [Auth::user()]) }} method="post">
                        @csrf
                        <input type="hidden" name="user_id" value={{ $user->id }}>
                        <input type="submit" class="btn btn-success" value="Добавить в друзья">
                    </form>
                @endif
            @endif @endauth
        </div>
    </x-slot>


    @can('view-trashed')
        <x-items :items="$user->trashedItems->merge($user->items)"/>
    @else
        <x-items :items="$user->items"/>
    @endcan
</x-app-layout>
