<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

      protected $fillable = ['name','icon', 'svg_icon'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeSearch($query, $term)
    {
      $term = "%$term%";

      $query->where(function ($query) use ($term) {
       $query->where('name', 'like', $term);
            
            
     });
    }
}
