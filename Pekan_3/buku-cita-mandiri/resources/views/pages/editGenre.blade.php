@extends('layouts.master')
@section('title')
    Edit Genre
@endsection
@section('content')
    <form action="/genre/{{ $genre->id }}" method="POST" class="w-50 mx-auto">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $genre->name }}"
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" cols="30" rows="5"
                class="form-control 
            @error('description')
                is-invalid
            @enderror">{{ $genre->description }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
