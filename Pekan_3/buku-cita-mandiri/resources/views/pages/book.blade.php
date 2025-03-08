@extends('layouts.master')
@section('name')
    {{ $book->title }}
@endsection
@section('content')
    <div class="row">
        <div class="col-3 border border-1">
            <img src="{{ asset('image/' . $book->image) }}" alt="" style="width: 20rem;">
        </div>
        <div class="col">
            <h1>{{ $book->title }}</h1>
            <p>
                <span class="fs-5">
                    Summary
                </span>
                <br>
                {{ $book->summary }}
            </p>
            <p>
                <span class="fs-5">
                    Genre:
                </span>
                {{ $book->genre }}
            </p>
            <p class="card-text">
                <span class="fs-5">
                    Stock:
                </span>
                {{ $book->stok }}
            </p>
            @auth
                <h2>Comment</h2>

                <form action="/comment" method="post" class="d-flex flex-column gap-2">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <textarea name="comment"
                        class="form-control w-50 @error('comment')
                        is-invalid
                    @enderror"></textarea>
                    @error('comment')
                        <div class="alert alert-danger w-50">{{ $message }}</div>
                    @enderror
                    <input type="submit" value="Comment" class="btn btn-primary w-25">
                </form>
            @endauth
        </div>
    </div>
    <div class="w-50 mt-5">
        <h2>Testimoni</h2>
        @foreach ($comments as $comment)
            <p class="">
                <span class="fw-bold">
                    {{ $comment->name }}
                </span> <br>
                {{ $comment->content }}
            </p>
        @endforeach
    </div>
    <a href="/books" class="btn btn-primary mt-3">Back</a>
@endsection
