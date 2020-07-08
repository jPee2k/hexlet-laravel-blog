@extends('layouts.app')

@section('title', 'Создать категорию')
@section('header', 'Создать категорию')

@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ Form::model($category, ['url' => route('article_categories.store')]) }}
        @include('article_category.form')
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
