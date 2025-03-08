<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BookController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index','show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::join('genres', 'books.genre_id',"=","genres.id")
        ->select('books.*', 'genres.name as genre')
        ->get();

        return view('pages.books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = DB::table('genres')->get();
        return view('pages.formBook', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'title'=>'required',
            'summary'=>'required',
            'genre_id'=>'required',
            'stok'=>'required',
        ]);

        $book = new Book;
        $book->title = $request->title;
        $book->summary = $request->summary;
        $book->stok = $request->stok;
        $book->genre_id = $request->genre_id;

        $newImageName = time().'.'.$request->image->extension();   
        $request->image->move(public_path('image'), $newImageName);
        $book->image = $newImageName;

        $book->save();

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $comments= Comment::join('users', 'comments.user_id', '=','users.id')
        ->where('comments.book_id','=',$id)
        ->get();

        $book = Book::join('genres', 'books.genre_id', '=', 'genres.id')
                ->select('books.*', 'genres.name as genre')
                ->where('books.id', $id)
                ->first();

        return view('pages.book', compact('book', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $genres = DB::table('genres')->get();
        return view('pages.editBook', compact('book', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png|max:2048',
            'title'=>'required',
            'summary'=>'required',
            'genre_id'=>'required',
            'stok'=>'required',
        ]);

        $book = Book::find($id);

        if ($request->has('image')) {
            File::delete('image/'.$request->image);
            $newImageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image'), $newImageName);
            $book->image = $newImageName;    
        }

        $book->title = $request->title;
        $book->summary = $request->summary;
        $book->stok = $request->stok;
        $book->genre_id = $request->genre_id;
        $book->save();
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('books')->where('id', $id)->delete();
        return redirect('/books');
    }
}
