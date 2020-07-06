@extends('layouts.app')

@section('title', 'new article')
@section('content')
    {{ Form::model($article, ['url' => route('articles.store')]) }}
        @include('article.form')
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
