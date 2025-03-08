@extends('layouts.master')
@section('name')
    {{ $book->title }}
@endsection
@section('content')
    <div class="d-flex gap-2">
        <img src="{{ asset('image/' . $book->image) }}" alt="" style="width: 20rem;">
        <div>
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
            @forelse ($comments as $comment)
                <div class="w-50 mt-5">
                    <h2>Testimoni</h2>
                    <p class="ps-2">
                        <span class="fw-bold">
                            {{ $comment->name }}
                        </span> <br>
                        {{ $comment->content }}
                    </p>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    <a href="/books" class="btn btn-primary mt-3">Back</a>
@endsection
