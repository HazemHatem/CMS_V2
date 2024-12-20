<?php

namespace App\Http\Controllers\Admin\Article;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
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
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->paginate(12)
            ->appends($request->all());
        return view('Admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('Admin.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = Auth::id();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        $article = Article::create($data);
        $article->categories()->sync($request->category_id);
        return redirect()->route('Admin.article.index')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $rating = round($article->ratings()->avg('rating'));
        return view('Admin.article.show', compact('article', 'rating'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('Admin.article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            FileHelper::deleteimage($article->image);
            $data['image'] = $request->file('image')->store('articles/', 'public');
        }
        $article->update($data);
        $article->categories()->sync($request->category_id);
        return redirect()->route('Admin.article.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        FileHelper::deleteimage($article->image);
        $article->delete();
        return redirect()->route('Admin.article.index')->with('success', 'Article deleted successfully');
    }
}
