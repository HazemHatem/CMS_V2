<?php

namespace App\Http\Controllers\Site\Rating;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Rating\RatingRequest;
use App\Models\Rating;
use App\Models\Article;

class RatingController extends Controller
{
    public function rateArticle(RatingRequest $request, Article $article)
    {
        $user = auth()->user();
        Rating::updateOrCreate(
            [
                'user_id' => $user->id,
                'article_id' => $article->id
            ],
            ['rating' => $request->rating]
        );
        return redirect()->back()->with('success', 'Rating updated successfully');
    }
}
