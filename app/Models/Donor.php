<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'email', 'phone', 'address', 'city', 'state'];

    public function donation()
    {
        return $this->hasMany(Donation::class);
    }

    public function scopeSearch($query, $term)
    {
      $term = "%$term%";

      $query->where(function ($query) use ($term) {
       $query->where('full_name', 'like', $term)
             ->orWhere('email', 'like', $term)
             ->orWhereHas('donation', function ($query) use ($term) {
                 $query->where('amount', 'like', $term);
             });
            
     });
    }
}
