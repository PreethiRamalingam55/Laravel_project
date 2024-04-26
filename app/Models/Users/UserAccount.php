<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAccount extends Authenticatable
{
    use HasFactory;

    protected $table = 'user_accounts';

    protected $fillable = [
        'name','account_number','password','bank_name',
    ];

    protected $hidden = [
        'password',
    ];
}
