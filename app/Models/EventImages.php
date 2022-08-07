<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventImages extends Model
{
    use HasFactory;

    protected $fillable = [ 'images' ];

    public function event()
    {
        return $this->belongsTo('App\Model\Event');
    }
}
