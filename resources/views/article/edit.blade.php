@extends('layouts.app')

@section('title', 'Изменить статью')
@section('header', 'Изменить статью')

@section('content')
    {{ Form::model($article, ['url' => route('articles.update', $article), 'method' => 'PATCH']) }}
        @include('article.form')
        {{ Form::submit('Обновить') }}
        <a href="{{ route('articles.destroy', $article) }}"
            data-confirm="Вы уверены?"
            data-method="delete"
            rel="nofollow">Удалить
        </a>
    {{ Form::close() }}
@endsection
