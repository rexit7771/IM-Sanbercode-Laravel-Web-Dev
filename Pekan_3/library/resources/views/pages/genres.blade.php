@extends('layouts.master')
@section('title')
    Genres
@endsection
@section('content')
    @auth

        @if (Auth()->user()->role == 'admin')
            <a href="/genre/create" class="btn btn-primary mb-3">Add Genre</a>
        @endif
    @endauth
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $genre)
                <tr>
                    <th>{{ $loop->iteration }} </th>
                    <td>{{ $genre->name }}</td>
                    <td>{{ $genre->description }}</td>
                    <td>
                        <form action="/genre/{{ $genre->id }}" method="post" class="d-flex gap-2">
                            @method('DELETE')
                            @csrf
                            <a href="/genre/{{ $genre->id }}" class="btn btn-info">Detail</a>
                            @auth

                                @if (Auth()->user()->role == 'admin')
                                    <a href="/genre/{{ $genre->id }}/edit" class="btn btn-warning">Edit</a>
                                    <input type="submit" value="Delete" href="/genre/{{ $genre->id }}"
                                        class="btn btn-danger">
                                @endif
                            @endauth
                        </form>
                    </td>
                </tr>
            @empty
                <h3>Sorry, Nothing's found</h3>
            @endforelse
        </tbody>
    </table>
@endsection
