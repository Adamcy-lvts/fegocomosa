<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'caption',
        'banner_id',
        'link1',
        'link2',
        'info',
    ];
}
