<x-app-layout>

    <x-slot name="title">{{ $item->name }}</x-slot>


    <x-slot name="header">
        <h2 >{{ $item->name }}</h2>
    </x-slot>

    <x-item-full :item="$item"/>

    @foreach($item->comments as $comment)
        <div class="card mb-3">
            <div class="card-header">
                @if($comment->user->friendTo(Auth::user()))
                    <i class="fa-solid fa-user-group"></i>
                @endif
                {{ $comment->user->name }} в {{ $comment->created_at }}
            </h5>
            <div class="card-body">
                <p class="card-text">{{ $comment->text }}</p>
            </div>
        </div>
    @endforeach

    @can('create', App\Models\Comment::class)
    <form action={{ route('comments.store', [$item]) }} method="post">
        @csrf
        <div class="form-group mt-5">
            <label class="mb-3" for="commentText">Комментарий</label>
            <textarea class="form-control mb-3" id="commentText" name="text" rows="3"></textarea>
            <button type="submit" class="btn btn-success">Отправить</button>
        </div>
    @endcan

</x-app-layout>
