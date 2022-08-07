<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'h1', 'h2', 'link1', 'link2', 'info1', 'info2', 'logo'
    ];
}
