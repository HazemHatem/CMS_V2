<?php

namespace App\Http\Controllers\Site\Author\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('site.author.dashboard.index');
    }
}
