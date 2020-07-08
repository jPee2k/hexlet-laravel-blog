@extends('layouts.app')

@section('title', 'Создать категорию')
@section('header', 'Создать категорию')

@section('content')
    {{ Form::model($category, ['url' => route('article_categories.store')]) }}
        @include('article_category.form')
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
