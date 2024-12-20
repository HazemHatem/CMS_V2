<?php

namespace App\Http\Controllers\Site\Wishlist;

use App\Http\Controllers\Controller;
use App\Http\requests\site\Wishlist\WishlistRequest;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->paginate(10);
        return view('site.wishlist.index', compact('wishlist'));
    }

    public function store(WishlistRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        Wishlist::create($data);
        return redirect()->back()->with('success', 'Article added to wishlist successfully');
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect()->back()->with('success', 'Article removed from wishlist successfully');
    }
}
