<?php

namespace App\Http\Controllers\Site\Category;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(6);
        return view('site.categories.index', compact('categories'));
    }

    public function article(Category $category)
    {
        $articles = Article::where('category_id', $category->id)->paginate(10);
        return view('site.article.index', compact('articles'));
    }
}
