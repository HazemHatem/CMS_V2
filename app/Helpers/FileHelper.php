<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function userimage(string $path = null)
    {
        return isset($path) ? asset('storage/' . $path) : asset('site/images/user.png');
    }
    public static function truncateDescription($description, $words = 10)
    {
        return Str::words($description, $words, '...');
    }

    public static function authorimage(string $path = null)
    {
        return isset($path) ? asset('storage/' . $path) : asset('site/Style/image/img/oo.jpg');
    }

    public static function articleimage(string $path = null)
    {
        return isset($path) ? asset('storage/' . $path) : asset('site/Style/image/post.jpg');
    }

    public static function categoryimage(string $path = null)
    {
        return isset($path) ? asset('storage/' . $path) : asset('site/Style/image/categories/landing.jpg');
    }

    public static function deleteimage($image)
    {
        if ($image) {
            Storage::disk('public')->delete($image);
        }
    }
}
