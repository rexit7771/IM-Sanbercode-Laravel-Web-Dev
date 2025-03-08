<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'comment'=>'required',
            'book_id'=>'required',
            'user_id'=>'required'
        ]);

        $comment = new Comment;
        $comment->content = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->book_id = $request->book_id;
        $comment->save();

        return redirect('/books/'.$request->book_id);
    }

    public function destroy(string $id){
        return $id;
    }
}
