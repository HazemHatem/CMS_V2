<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'status',
        'image',
        'author_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function countlikes()
    {
        return $this->likes()->count('type', 'like');
    }

    public function countdislikes()
    {
        return $this->likes()->count('type', 'dislike');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function status()
    {
        if ($this->status == 'draft') {
            return "<span class='badge bg-warning'>Draft</span>";
        } elseif ($this->status == 'published') {
            return "<span class='badge bg-success'>Published</span>";
        } else {
            return "<span class='badge bg-danger'>Unpublished</span>";
        }
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function countviews()
    {
        return $this->views()->count();
    }
}
