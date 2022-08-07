<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'commentable_id', 'commentable_type', 'comment' ,'user_id' ,'parent_id', 'is_approved'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

     public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }
}
