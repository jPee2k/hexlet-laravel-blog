@extends('layouts.app')

@section('title')
    {{ $category->name }}
@endsection

@section('header')
    {{ $category->name }}
@endsection

@section('content')
    <small>
        <a href="{{ route('article_categories.edit', $category) }}">Изменить</a>
        <a href="{{ route('article_categories.destroy', $category) }}"
            data-method="delete"
            rel="nofollow"
            data-confirm="Are you sure?">Удалить
        </a>
    </small>
    <div>{{ $category->description }}</div>
    @if (!$articles->isEmpty())
    <div>
        <h2>Статьи из категории</h2>
        <ol>
            @foreach ($articles as $article)
            <li>
                <a href="{{ route('articles.show', $article->id) }}">{{ $article->name }}</a>
            </li>
            @endforeach
        </ol>
    </div>
    @endif
@endsection
