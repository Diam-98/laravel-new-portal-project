<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $comments = Comment::wherehas('article', function ($query) use ($user){
            $query->where('author_id', $user->id);
        })->get();

        return view('back.comment', compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Comment $comment)
    {

        $comment->isActive = 0;

        $comment->update();

        return back()->with('success', 'Commentaire bloque avec succes');
    }

    public function unlock(int $id)
    {

        $comment = Comment::where('id', $id)->first();

        $comment->isActive = 1;

        $comment->update();

        return back()->with('success', 'Commentaire debloque avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Commentaire supprime avec succes');
    }
}
