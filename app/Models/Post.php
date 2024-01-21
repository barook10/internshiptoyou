<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    // Adding an event to handle image upload before saving the post
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->uploadImage();
        });

        static::updating(function ($post) {
            $post->uploadImage();
        });
    }

    // Image upload logic
    public function uploadImage()
    {
        if (request()->hasFile('image')) {
            // Remove old image if exists
            if ($this->image) {
                Storage::delete('public/' . $this->image);
            }

            // Upload new image
            $imagePath = request()->file('image')->store('images', 'public');
            $this->image = $imagePath;
        }
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
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
