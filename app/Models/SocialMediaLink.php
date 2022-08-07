<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMediaLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'facebook', 'twitter', 'instagram', 'whatsapp', 'telegram', 'linkedin', 'website'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postedLinks(User $user)
    {
        return $this->user->where('user_id', $user->id);
    }
}
