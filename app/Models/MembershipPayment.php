<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MembershipPayment extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id', 'amount', 'year', 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function scopeSearch($query, $term)
    {
      $term = "%$term%";

      $query->where(function ($query) use ($term) {
       $query->where('year', 'like', $term)
             ->orWhere('amount', 'like', $term)
             ->orWhere('datetime', 'like', $term)
             ->orWhereHas('user', function ($query) use ($term) {
                 $query->where('first_name', 'like', $term)
                 ->orWhere('last_name', 'like', $term)
                 ->orWhere('middle_name', 'like', $term);
             });
            
     });
    }
}
