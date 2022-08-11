<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryYear extends Model
{
    protected $fillable =[
        'year'
    ];
    use HasFactory;
}
