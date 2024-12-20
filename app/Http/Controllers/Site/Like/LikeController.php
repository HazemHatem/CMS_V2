<?php

namespace App\Http\Controllers\Site\Like;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Like;
use App\Http\Requests\Site\Like\LikeRequest;

class LikeController extends Controller
{
    public function toggleLike(Article $article, LikeRequest $request)
    {
        $user = auth()->user();
        $type = $request->type;

        $like = Like::where('user_id', $user->id)
            ->where('article_id', $article->id)
            ->first();

        if ($like) {
            if ($like->type === $type) {
                $like->delete();
                return redirect()->back();
            } else {
                $like->update(['type' => $type]);
                return redirect()->back();
            }
        } else {
            Like::create([
                'user_id' => $user->id,
                'article_id' => $article->id,
                'type' => $type,
            ]);
            return redirect()->back();
        }
    }
}
