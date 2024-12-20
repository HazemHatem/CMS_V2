<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categories = Category::all();
        $most_views = View::with('article')->limit(2)->get();
        $Most_viewed_article = [];
        foreach ($most_views as $view) {
            $Most_viewed_article[] = $view->article;
        }
        $articles = Article::latest('created_at')
            ->where('status', 'published')
            ->limit(6)
            ->get();
        return view('site.home.index', compact('Most_viewed_article', 'categories', 'articles'));
    }
}
