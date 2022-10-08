<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProjectImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id','slug', 'budget', 'starting_date',
     'completion_date', 'proposed_by', 'executed_by',
      'status', 'progress_indicator', 'body', 'cover_image' ];

    public function images()
    {
        return $this->hasMany(ProjectImages::class);
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
             ->orWhere('budget', 'like', $term)
             ->orWhere('proposed_by', 'like', $term)
             ->orWhere('executed_by', 'like', $term)
             ->orWhereHas('user', function ($query) use ($term) {
                 $query->where('first_name', 'like', $term);
             });
            
     });
    }
}
