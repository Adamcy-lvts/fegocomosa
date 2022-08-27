<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLogoutActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'user_agent', 'ip_address', 'login_at', 'logout_at'
    ];
}
