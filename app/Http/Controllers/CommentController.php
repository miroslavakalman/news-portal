<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
{
    $comments = Comment::all();
    return view('comments.index', compact('comments'));
}

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Комментарий успешно удален.');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required',
            'post_id' => 'required|exists:posts,id', 
        ]);

        $comment = new Comment();
        $comment->name = $validatedData['name'];
        $comment->email = $validatedData['email'];
        $comment->content = $validatedData['content'];
        $comment->post_id = $validatedData['post_id'];
        $comment->save();

        return back()->with('success', 'Комментарий успешно добавлен.');
    }
}
