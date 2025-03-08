@extends('layouts.master')
@section('title')
    Add Book
@endsection
@section('content')
    <form action="/books" method="POST" class="w-50 mx-auto" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea name="summary" cols="30" rows="5"
                class="form-control 
            @error('summary')
                is-invalid
            @enderror"></textarea>
            @error('summary')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <label for="image" class="form-label">Image</label>
        <div class="input-group mb-3">
            <input type="file" name="image"
                class="form-control 
            @error('image')
                is-invalid
            @enderror">
        </div>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="stok" class="form-label">stok</label>
            <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror">
            @error('stok')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select name="genre_id" class="form-select @error('genre_id') is-invalid @enderror">
                <option selected disabled>...</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }} </option>
                @endforeach
            </select>
            @error('genre_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
