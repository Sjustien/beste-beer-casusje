<?php

namespace App\Http\Controllers;


use App\Models\Bier;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request, Bier $bier)
{
    $formFields = $request->validate([
        'content' => 'required',
    ]);

    // Create a new comment instance
    $comment = new Comment();
    $comment->content = $formFields['content'];
    
    // Associate the comment with the provided beer
    $bier->comments()->save($comment);

    return back()->with('message', 'Comment Opgeslagen');
}

    // public function update(Request $request, Comment $comment)
    // {
    //     $formFields = $request->validate([
    //         'content' => 'required',
    //     ]);

    //     $comment->update($formFields);
    //     return back();
    // }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('message', 'Comment Verwijderd');
    }
}
