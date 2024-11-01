<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'search_key' => ['string', 'required']
        ]);

        $articles = Article::where('title', 'like', "%$request->search_key%")->get();


        return view('front.search', compact('articles'));
    }
}
