<x-app-layout>
    <x-slot name="header">
        <h2 > Предмет </h2>
    </x-slot>

    @empty($item)
        @php
            $action = route('items.store');
        @endphp
        <x-slot name="title">Добавить объект</x-slot>
    @else
        @php
            $action = route('items.update', [$item]);
        @endphp
        <x-slot name="title">Редактировать объект</x-slot>
    @endif

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
                        <input id="image" type="file" name="image" style="display:none" required>
                    @else
                        <img id="imagePreview" class="img-fluid rounded" 
                             src="{{ asset('img/uploads/' . $item->image) }}">
                        <input id="image" type="file" name="image" style="display:none">
                    @endif
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
                    <input id="name" name="name" class="form-control" value="{{ $item->name ?? ''}}" required>
                </div>
                <div class="form-group mb-2">
                    <label for="type">Тип</label>
                    <input id="type" name="type" class="form-control" value="{{ $item->type ?? ''}}" required>
                </div>
                <div class="form-group mb-2">
                    <label for="description">Описание</label>
                    <input id="description" name="description" class="form-control"
                           value="{{ $item->description ?? ''}}" required>
                </div>
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </div>
    </form>
</x-app-layout>
