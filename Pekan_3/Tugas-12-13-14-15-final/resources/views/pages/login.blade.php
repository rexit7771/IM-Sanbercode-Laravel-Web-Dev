@extends('layouts.master')
@section('title')
    Login
@endsection
@section('content')
    <form action="/login" method="POST" class="w-50 mx-auto">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
            <p>Don't have an account ? <a href="/register">Sign Up</a></p>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection
