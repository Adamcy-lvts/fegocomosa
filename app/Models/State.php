<?php

namespace App\Models;

use App\Models\Lga;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;


    public function cities()
    {
       return $this->hasMany(Lga::class);
    }

    function user() {

        return $this->hasMany(User::class);
    }
}
