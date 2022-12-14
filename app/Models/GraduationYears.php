<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GraduationYears extends Model
{
    use HasFactory;

    protected $fillable = [
        'year'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
