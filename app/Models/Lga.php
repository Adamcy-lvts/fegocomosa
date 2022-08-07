<?php

namespace App\Models;

use App\Models\User;
use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lga extends Model
{
    use HasFactory;

    public function state()
    {
       return $this->belongsTo(State::class);
    }

    function user() {

        return $this->hasMany(User::class);
    }
}
