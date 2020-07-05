@extends('layouts.app')

@section('title', 'new article')
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
    {{ Form::model($article, ['url' => route('articles.store')]) }}
        {{ Form::label('name', 'Название') }}
        {{ Form::text('name') }}<br>
        {{ Form::label('body', 'Содержимое') }}
        {{ Form::textarea('body') }}<br>
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
