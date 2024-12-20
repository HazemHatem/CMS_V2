<?php

namespace App\Http\Controllers\Admin\Wishlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index(Request $request)
    {
        $wishlist = Wishlist::latest('updated_at')->paginate(10);
        return view('Admin.wishlist.index', compact('wishlist'));
    }
}
