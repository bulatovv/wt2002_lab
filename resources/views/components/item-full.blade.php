<p>{{ $item->description }}</p> 
<img class="img-fluid mb-1" src="{{ asset('img/uploads/' . $item->image) }}"><br>

<div class="container d-flex mb-3">
    @can('update', $item)
        <a href="{{ route('items.edit', [$item]) }}" class="btn btn-success mx-1">Редактировать</a>
    @endcan

    @can('delete', $item)
        <form action={{ route('items.destroy', [$item]) }} method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Удалить">
        </form>
    @endcan
</div>

<div class="container d-flex">
    @can('forceDelete', $item)
        @if($item->trashed())
            <form action={{ route('items.restore', [$item]) }} method="post">
                @csrf
                <input type="submit" class="btn btn-secondary mx-1" value="Восстановить">
            </form>
        @endif
    @endcan

    @can('restore', $item)
        <form action={{ route('items.forceDelete', [$item]) }} method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-dark" value="Стереть навсегда">
        </form>
    @endcan
</div>
