<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontCategoryController extends Controller
{
    public function index(string $slug){

        $category = Category::where('slug', $slug)->where('isActive', 1)->with('articles')->first();

        return view('front.category', compact('category'));
    }
}
