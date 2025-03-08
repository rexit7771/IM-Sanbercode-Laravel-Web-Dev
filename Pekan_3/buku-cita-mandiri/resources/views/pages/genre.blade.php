@extends('layouts.master')
@section('name')
    {{ $genre[0]->name }} Genre
@endsection
@section('content')
    <h1>{{ $genre[0]->name }} Genre</h1>
    <h3>Description:</h3>
    <p>
        {{ $genre[0]->description }}
    </p>

    <h3>Book List:</h3>
    <ul>
        @forelse ($genre as $book)
            <li>{{ $book->title }}</li>
        @empty
            <p>Oops sorry, Nothing's found</p>
        @endforelse
    </ul>
    <a href="/genre" class="btn btn-primary">Back</a>
@endsection
