<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','institution_name', 'field_of_study', 'certificate', 'starting_date', 'completion_date'
    ];
}
