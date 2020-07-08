@extends('layouts.app')

@section('title', 'Категории статей')
@section('header', 'Список категорий')

@section('content')
    @if (Session::has('success'))
        <div>
            {{ Session::get('success') }}
        </div>
    @endif
    <small><a href="{{ route('article_categories.create') }}">Создать категорию</a></small>
        @foreach ($categories as $category)
        <h2>
            <a href="{{ route('article_categories.show', $category) }}">{{ $category->name }}</a>
            (
                <a href="{{ route('article_categories.edit', $category) }}">Изменить</a>
                <a href="{{ route('article_categories.destroy', $category) }}"
                    data-method="delete"
                    rel="nofollow"
                    data-confirm="Are you sure?">Удалить
                </a>
            )
        </h2>
        <div>{{ $category->description }}</div>
        @endforeach
    <div>{{ $categories->links() }}</div>
@endsection
