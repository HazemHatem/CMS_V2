<?php

namespace App\Http\Controllers\Site\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articles = Article::latest('updated_at')
            ->where('status', 'published')
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->paginate(9)
            ->appends($request->all());
        return view('site.article.index', compact('articles'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        abort_if($article->status != 'published', 404);
        $userRating = $article->ratings()->where('user_id', auth()->id())->first();
        if (Auth::check()) {
            $hasViewed = $article->views()->where('user_id', auth()->id())->exists();
            if (!$hasViewed) {
                $article->views()->create([
                    'user_id' => auth()->id(),
                ]);
            }
        }
        return view('site.article.show', compact('article', 'userRating'));
    }
}
