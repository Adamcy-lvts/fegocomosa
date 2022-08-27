<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organizer extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['org_name'];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
