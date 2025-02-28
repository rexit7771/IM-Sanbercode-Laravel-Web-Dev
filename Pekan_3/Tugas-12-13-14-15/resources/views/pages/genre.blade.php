@extends('layouts.master')
@section('name')
    {{ $genre->name }} Genre
@endsection
@section('content')
    <h1>{{ $genre->name }} Genre</h1>
    <p>
        {{ $genre->description }}
    </p>
    <a href="/genre" class="btn btn-primary">Back</a>
@endsection
