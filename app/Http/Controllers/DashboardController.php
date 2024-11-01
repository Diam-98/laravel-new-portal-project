<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();

        if ($user->role == 'author'){
            $author_articles = Article::where('author_id', $user->id)->count();
        }

        $articles = Article::all();
        $recent_articles = Article::where('isActive', 1)->orderBy('created_at', 'DESC')->take(10)->get();
        $categories = Category::count();

        return view('back.dashboard',
            [
                'author_articles' => $user->role == 'author' ? $author_articles : null,
                'articles' => $articles,
                'recent_articles' => $recent_articles,
                'categories' => $categories
            ]
        );
    }
}
