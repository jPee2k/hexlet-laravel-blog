@extends('layouts.app')

@section('title', 'article')
@section('content')
    <h1>{{$article->name}}</h1>
    <small><a href="{{ route('articles.edit', $article) }}">Редактировать</a></small>
    <small><a href="{{ route('articles.destroy', $article) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a></small>
    <div>{{$article->body}}</div>
@endsection
