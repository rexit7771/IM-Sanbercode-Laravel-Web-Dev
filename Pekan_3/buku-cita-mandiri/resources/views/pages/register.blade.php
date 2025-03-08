@extends('layouts.master')
@section('title')
    Register
@endsection
@section('content')
    <form action="/register" method="POST" class="w-50 mx-auto">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name"
                class="form-control @error('name')
                is-invalid
            @enderror">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email"
                class="form-control @error('email')
                is-invalid
            @enderror">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password"
                class="form-control @error('password')
                is-invalid
            @enderror">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmation Password</label>
            <input type="password" name="password_confirmation"
                class="form-control @error('password')
                is-invalid
            @enderror">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <p>Already have an account ? <a href="/login">Log In</a></p>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection
