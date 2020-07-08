@extends('layouts.app')

@section('title', htmlspecialchars($article->name))
@section('header')
    {{ $article->name }}
    (
        <a href="{{ route('article_categories.show', $article->category_id) }}">{{ $category->name }}</a>
    )
@endsection

@section('content')
    <small>
        <a href="{{ route('articles.edit', $article) }}">Редактировать</a>
        <a href="{{ route('articles.destroy', $article) }}"
            data-confirm="Вы уверены?"
            data-method="delete"
            rel="nofollow">Удалить
        </a>
    </small>
    <div>{{$article->body}}</div>
@endsection
