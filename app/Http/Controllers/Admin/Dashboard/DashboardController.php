<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Article;
use App\Models\View;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request to display dashboard statistics.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $users = User::where('rule_id', 1)->count();
        $messages = Contact::count();
        $articles = Article::count();
        $authors = User::where('rule_id', 2)->count();
        $articles_new = Article::latest('created_at')->limit(5)->get();
        $articles_popular =  View::with('article')
            ->limit(5)
            ->get()
            ->pluck('article')
            ->all();
        return view('Admin.Dashboard.index', compact('users', 'messages', 'articles', 'authors', 'articles_new', 'articles_popular'));
    }
}
