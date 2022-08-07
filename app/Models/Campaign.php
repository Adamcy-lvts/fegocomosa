<?php

namespace App\Models;

use App\Models\Organizer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['campaign_title', 'description', 'starting_date', 'organizer_id', 'cover_image', 'about', 'goal' ];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
