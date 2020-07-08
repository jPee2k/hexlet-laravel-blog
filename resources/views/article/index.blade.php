@extends('layouts.app')

@section('title', 'Статьи')
@section('header', 'Список статей')

@section('content')
    <small><a href="{{route('articles.create')}}">Создать статью</a></small>
    @if (Session::has('success'))
        <div>
            {{ Session::get('success') }}
        </div>
    @endif

    @foreach ($articles as $article)
        <div>
            <h2><a href="{{ route('articles.show', $article) }}">{{ $article->name }}</a></h2>
            <small><a href="{{ route('articles.edit', $article) }}">Редактировать</a></small>
            <small><a href="{{ route('articles.destroy', $article) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a></small>
        </div>
        <div>{{ Str::limit($article->body, 200) }}</div>
    @endforeach
    <div>{{$articles->links()}}</div>
@endsection
