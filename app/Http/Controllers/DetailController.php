<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(string $slug){

        $article = Article::where('slug', $slug)->with('comments')->first();

        $new_view = $article->views + 1;
        $article->views = $new_view;
        $article->update();

        return view('front.detail', compact('article'));
    }

    public function comment(StoreCommentRequest $request, int $id){
        $request->validated($request->all());

        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'web_site' => $request->web_site,
            'message' => $request->message,
            'article_id' => $id
        ]);

        return back()->with('success', 'Commentaire envoye avec succes');

    }
}
