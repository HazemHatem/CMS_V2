<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function rule()
    {
        if ($this->name == 'admin') {
            return "<span class='badge badge-danger'>Admin</span>";
        } elseif ($this->name == 'author') {
            return "<span class='badge badge-info'>Author</span>";
        } elseif ($this->name == 'manager') {
            return "<span class='badge badge-warning'>Manager</span>";
        } else {
            return "<span class='badge badge-success'>User</span>";
        }
    }
}
