@extends('layouts.app')

@section('title', 'Новая статья')
@section('header', 'Добавить статью')

@section('content')
    {{ Form::model($article, ['url' => route('articles.store')]) }}
        @include('article.form')
        {{ Form::submit('Добавить') }}
    {{ Form::close() }}
@endsection
