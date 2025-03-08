@extends('layouts.master')
@section('title')
    Books
@endsection
@section('content')
    @auth

        @if (Auth()->user()->role == 'admin')
            <a href="/books/create" class="btn btn-primary mb-2">Add Book</a>
        @endif
    @endauth

    <div class="d-flex gap-2">

        @forelse ($books as $book)
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('image/' . $book->image) }}" class="card-img-top" style="height: 30rem">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }} </h5>
                    <p class="card-text">Summary: <br> {{ Str::limit($book->summary, 100) }} </p>
                    <p class="card-text">Genre: <br> {{ $book->genre }} </p>
                </div>
                <div class="card-footer">
                    <form action="/books/{{ $book->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="/books/{{ $book->id }}" class="btn btn-info">Detail</a>
                        @auth
                            @if (Auth()->user()->role == 'admin')
                                <a href="/books/{{ $book->id }}/edit" class="btn btn-warning">Edit</a>
                                <input type="submit" value="Delete" href="/books/{{ $book->id }}" class="btn btn-danger">
                            @endif
                        @endauth
                    </form>
                </div>
            </div>
        @empty
            <h3>Sorry, Nothing's found</h3>
        @endforelse
    </div>
@endsection
