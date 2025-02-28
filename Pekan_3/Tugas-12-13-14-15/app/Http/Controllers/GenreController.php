<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index(){
        $genres = DB::table('genres')->get();
        return view('pages.genres', compact('genres'));
    }

    public function create(){
        return view('pages.formGenre');
    }

    public function store(Request $request){
        $request->validate([
            'name'=> 'required',
            'description'=>'required'
        ],
        [
            'required'=>':attribute is required',
        ]
    );
    $name = $request->name;
    $desc = $request->description;
    DB::table('genres')->insert([
        'name'=>$name,
        'description'=>$desc
    ]);

    return redirect('/genre');
    }

    public function show(string $id){
        $genre = DB::table('genres')->find($id);
        return view('pages.genre', compact('genre'));
    }
    
    public function edit(string $id){
        $genre = DB::table('genres')->find($id);
        return view('pages.editGenre', compact('genre'));
    }

    public function update(Request $request){
        $request->validate([
            'name'=> 'required',
            'description'=>'required'
        ],
        [
            'required'=>':attribute is required',
        ]
    );
    $id = $request->id;
    $name = $request->name;
    $desc = $request->description;
    DB::table('genres')->where('id', $id)->update([
        'name'=>$name,
        'description'=>$desc
    ]);

    return redirect('/genre');
    }

    public function destroy(string $id){
        DB::table('genres')->where('id', $id)->delete();
        return redirect('/genre');
    }
}
