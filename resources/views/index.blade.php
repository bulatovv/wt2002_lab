@extends('base')

@section('title', 'Заголовок')

@section('nav-items')
    <li class="nav-item align-self-center">
        <button type="button" class="btn btn-upload">Загрузить</button>
    </li>
@endsection

@section('main')
    @include('items')
@endsection
