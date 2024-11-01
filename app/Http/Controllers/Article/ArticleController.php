<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\article\StoreArticleRequest;
use App\Http\Requests\article\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin,author'){
            $articles = Article::all();
        }else{
            $articles = Article::where('author_id', Auth::user()->id)->get();
        }

        return view('back.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create',
            [
                'categories' => Category::where('isActive', 1)->get()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $request->validated($request->all());

        $image = $request->image;

        if ($image != null && !$image->getError()){
            $image = $request->image->store('asset', 'public');
        }

        $tags = explode(',', $request->tags);

        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'isActive' => $request->isActive,
            'isComment' => $request->isComment,
            'isSharable' => $request->isSharable,
            'image' => $image,

            'category_id' => $request->category_id,
            'author_id' => Auth::user()->id,
        ]);

        $article->tag($tags);

        return to_route('article.index')->with('success', 'Article enregistre avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('back.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('back.article.create',
            [
                'article' => $article,
                'categories' => Category::where('isActive', 1)->get()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $request->validated($request->all());

        $image = $request->image;

        if ($image != null && !$image->getError()){
            if ($article->image){
                Storage::disk('public')->delete($article->image);
            }
            $image = $request->image->store('asset', 'public');
        }

        $tags = explode(',', $request->tags);

        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'isActive' => $request->isActive,
            'isComment' => $request->isComment,
            'isSharable' => $request->isSharable,
            'image' => $image,

            'category_id' => $request->category_id,
        ]);

        $article->tag($tags);

        return to_route('article.index')->with('success', 'Article modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return back()->with('success', 'Article supprime avec succes');
    }
}
