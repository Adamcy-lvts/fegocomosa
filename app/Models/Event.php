<?php

namespace App\Models;

use App\Models\User;
use App\Models\EventImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'image', 'event_date', 'event_time', 'event_venue', 'body'];

    public function images()
    {
      return  $this->hasMany(EventImages::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $term)
    {
      $term = "%$term%";

      $query->where(function ($query) use ($term) {
       $query->where('title', 'like', $term)
             ->orWhere('event_venue', 'like', $term)
             ->orWhereHas('user', function ($query) use ($term) {
                 $query->where('username', 'like', $term);
             });
            
     });
    }
}
