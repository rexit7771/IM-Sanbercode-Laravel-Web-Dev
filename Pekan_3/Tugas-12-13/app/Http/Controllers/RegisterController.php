<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(){
        return view('pages.register');
    }

    public function register(Request $request){
        $firstName = $request->input("firstName");
        $lastName = $request->input("lastName");
        $gender=$request->input("gender");
        $languageSpoken=$request->input("languageSpoken");
        $bio=$request->input("bio");

        return view('pages.welcome', compact('firstName', 'lastName', 'gender', 'languageSpoken', 'bio'));
    }
}
