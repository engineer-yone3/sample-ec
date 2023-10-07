<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'admin_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_publish',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'is_publish' => 'bool',
        'created_at' => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];
}
