<x-app-layout>

    <x-slot name="title">Лента</x-slot>


    <x-slot name="header">
        <h2 > Лента </h2>
    </x-slot>

    <div class="mx-20">
        @foreach($items as $item)
            <div class="card w-75 mb-3">
                <div class="card-header">{{ $item->user->name }} в {{ $item->created_at }}</div>
                <div class="card-body">
                    <div class="card-title fs-4 fw-bold">{{ $item->name }}</div>
                    <div class="card-text">
                        {{ $item->description }}
                    </div>
                </div>
                <a href={{ route('items.show', [$item])}}>
                    <img class="card-img-bottom img-fluid" src="{{ asset('img/uploads/' . $item->image) }}">
                 </a>
            </div>
        @endforeach
    </div>
</x-app-layout>
