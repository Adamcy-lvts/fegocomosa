<?php

namespace App\Models;

use App\Models\User;
use App\Models\Donor;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['campaign_id', 'donor_id', 'user_id', 'amount', 'comment', 'date'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $term)
    {
      $term = "%$term%";

      $query->where(function ($query) use ($term) {
       $query->where('donor_id', 'like', $term)
             ->orWhere('amount', 'like', $term);    
     });
    }
}
