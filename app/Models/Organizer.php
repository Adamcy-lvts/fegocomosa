<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    protected $fillable = ['org_name'];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
