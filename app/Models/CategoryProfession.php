<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProfession extends Model
{
    use HasFactory;


    protected $fillable = ['name','icon', 'svg_icon'];

    public function user()
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
