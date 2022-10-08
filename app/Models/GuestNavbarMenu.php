<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestNavbarMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'link', 'visibility', 'sorting'
    ];

      protected $casts = [
        'visibility' => 'boolean',
    ];
}
