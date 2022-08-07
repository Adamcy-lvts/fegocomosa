<?php

namespace App\Models;

use App\Models\ProjectImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageCaption extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption', 'image_id', 
    ];

    public function image()
    {
        return $this->belongsTo(ProjectImages::class);
    }

    
}
