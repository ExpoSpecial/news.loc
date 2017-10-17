@extends('layouts.admin')

@section('content')
    <h1>Общая информация</h1>
    <hr>
    <h4>Количество новостей: <span class="badge">{{ $postCount }}</span></h4>
    <hr>
    <h4>Количество категорий: <span class="badge">{{ $categoriesCount }}</span></h4>
    <hr>
    <h4>Количество тегов: <span class="badge">{{ $tagsCount }}</span></h4>
@endsection