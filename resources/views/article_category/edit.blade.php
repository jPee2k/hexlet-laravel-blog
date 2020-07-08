@extends('layouts.app')

@section('title', 'Редактировать категорию')
@section('header', 'Редактировать категорию')

@section('content')
    {{ Form::model($category, ['method' => 'PATCH', 'url' => route('article_categories.update', $category)]) }}
        @include('article_category.form')
        {{ Form::submit('Обновить') }}
        <a href="{{ route('article_categories.destroy', $category) }}"
            data-method="delete"
            rel="nofollow"
            data-confirm="Are you sure?">Удалить
        </a>
    {{ Form::close() }}
@endsection
