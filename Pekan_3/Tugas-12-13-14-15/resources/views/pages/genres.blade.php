@extends('layouts.master')
@section('title')
    Genres
@endsection
@section('content')
    @forelse ($genres as $genre)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $genre->name }} </h5>
                <p class="card-text">{{ $genre->description }} </p>
                <form action="/genre/{{ $genre->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <a href="/genre/{{ $genre->id }}" class="btn btn-info">Detail</a>
                    <a href="/genre/{{ $genre->id }}/edit" class="btn btn-warning">Edit</a>
                    <input type="submit" value="Delete" href="/genre/{{ $genre->id }}" class="btn btn-danger">
                </form>
            </div>
        </div>
    @empty
        <h3>Sorry, Nothing's found</h3>
    @endforelse
@endsection
