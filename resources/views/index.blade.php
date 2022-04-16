@extends('base')

@section('title', 'Заголовок')

@section('nav-items')
    <li class="nav-item align-self-center">
        <a href="{{ route('items.create') }}" type="button" class="btn btn-upload btn-primary">Загрузить</a>
    </li>
@endsection

@section('main')
    @include('items')
@endsection
