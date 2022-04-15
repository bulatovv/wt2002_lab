@extends('base')

@section('title', 'Добавить объект')

@section('main')
    <form action="{{ route('items.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="container d-flex justify-content-evenly">
            <div class="left">
                <label for="image">
                    <img id="imagePreview" class="img-fluid rounded img-placeholder">
                    <input id="image" type="file" name="image" style="display:none">
                </label>
            </div>

            <div class="right w-50">
                <div class="form-group mb-2">
                    <label for="name">Название объекта</label>
                    <input id="name" name="name" class="form-control"></input>
                </div>
                <div class="form-group mb-2">
                    <label for="type">Тип</label>
                    <input id="type" name="type" class="form-control"></input>
                </div>
                <div class="form-group mb-2">
                    <label for="description">Описание</label>
                    <input id="description" name="description" class="form-control"></input>
                </div>
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </div>
    </form>
@endsection
