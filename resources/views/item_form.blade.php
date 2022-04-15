@extends('base')

@empty($item)
    @php
        $action = route('items.store');
    @endphp
    @section('title', 'Добавить объект')
@else
    @php
        $action = route('items.update', [$item]);
    @endphp
    @section('title', 'Редактировать объект')
@endif

@section('main')
    <form action="{{ $action }}" enctype="multipart/form-data" method="post">
        @csrf
        @isset($item)
            @method('PUT')
        @endif
        <div class="container d-flex justify-content-evenly">
            <div class="left">
                <label for="image">
                    @empty($item->image)
                        <img id="imagePreview" class="img-fluid rounded img-placeholder">
                    @else
                        <img id="imagePreview" class="img-fluid rounded" 
                             src="{{ asset('img/uploads/' . $item->image) }}">
                    @endif
                    <input id="image" type="file" name="image" style="display:none">
                </label>
                <script>
                    image.onchange = e => {
                        const [file] = image.files
                        if (file) {
                            imagePreview.src = URL.createObjectURL(file);
                            imagePreview.classList.remove("img-placeholder")
                         }
                    } 
                </script>
            </div>

            <div class="right w-50">
                <div class="form-group mb-2">
                    <label for="name">Название объекта</label>
                    <input id="name" name="name" class="form-control" value="{{ $item->name ?? ''}}"></input>
                </div>
                <div class="form-group mb-2">
                    <label for="type">Тип</label>
                    <input id="type" name="type" class="form-control" value="{{ $item->type ?? ''}}"></input>
                </div>
                <div class="form-group mb-2">
                    <label for="description">Описание</label>
                    <input id="description" name="description" class="form-control" value="{{ $item->description ?? ''}}"></input>
                </div>
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </div>
    </form>
@endsection
