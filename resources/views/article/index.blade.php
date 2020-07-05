@extends('layouts.app')

@section('title', 'articles')
@section('header', 'Список статей')

@section('content')
    @if (Session::has('success'))
        <div>
            {{ Session::get('success') }}
        </div>
    @endif

    @foreach ($articles as $article)
        <h2><a href="{{ route('articles.show', $article->id) }}">{{$article->name}}</a></h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
    <div>{{$articles->links()}}</div>
@endsection
