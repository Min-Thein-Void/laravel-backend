<?php

namespace App\Models;

use Illuminate\DataBase\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;


class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, $filter) //Blog::latest()
    {
        $query->when($filter['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });
        $query->when($filter['category'] ?? null, function ($query, $slug) {
            $query->whereHas('category', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
        });
        $query->when($filter['author'] ?? null, function ($query, $username) {
            $query->whereHas('author', function ($q) use ($username) {
                $q->where('username', $username);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
