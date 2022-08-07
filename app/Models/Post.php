<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\CategoryPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'body','active', 'featured', 'category_post_id', 'slug'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany('App\Models\PostImages');
    }

     public function category()
    {
        return $this->belongsTo(CategoryPost::class, 'category_post_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

     public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function scopeSearch($query, $term)
    {
      $term = "%$term%";

      $query->where(function ($query) use ($term) {
       $query->where('title', 'like', $term)
             ->orWhere('created_at', 'like', $term)
             ->orWhereHas('user', function ($query) use ($term) {
                 $query->where('first_name', 'like', $term);
             });
            
     });
    }
}
