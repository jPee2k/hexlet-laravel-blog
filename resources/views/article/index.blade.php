@extends('layouts.app')

@section('title', 'articles')
@section('header', 'Список статей')

@section('content')
    @foreach ($articles as $article)
        <h2>{{$article->name}}</h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
    <div>{{$articles->links()}}</div>
@endsection