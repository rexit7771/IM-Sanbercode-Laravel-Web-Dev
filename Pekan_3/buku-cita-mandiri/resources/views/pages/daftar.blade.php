@extends('layouts.master')
@section('title')
    Daftar
@endsection
@section('content')
    <h1>Buat Account baru</h1>
    <h3>Sign Up Form</h3>
    <form action="/daftar" method="POST" style="flex-direction: column; display:inline-flex; gap:10px">
        @csrf
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" str>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName">
        <label for="gender">Gender</label>
        <div>
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female
        </div>
        <label for="languageSpoken">Language Spoken</label>
        <div>
            <input type="checkbox" name="languageSpoken" value="indonesia">Bahasa Indonesia <br />
            <input type="checkbox" name="languageSpoken" value="english">English<br />
            <input type="checkbox" name="languageSpoken" value="arabic">Arabic<br />
            <input type="checkbox" name="languageSpoken" value="japanese">Japanese<br />
        </div>
        <label for="bio">Bio</label>
        <textarea name="bio" cols="30" rows="10"></textarea>
        <input type="submit" placeholder="Submit">
    </form>
@endsection
