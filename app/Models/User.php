<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone',
        'role',
        'image'
    ];
//protected $table='admins';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'first_name',
        'last_name',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function admin()
    {
        return $this->hasOne(\App\Models\Admin::class, 'account_id');
    }
    public function student()
    {
        return $this->hasOne(\App\Models\Student::class, 'account_id');
    }
    public function parent()
    {
        return $this->hasOne(\App\Models\ParentModel::class, 'account_id');
    }
    public function instructor()
    {
        return $this->hasOne(\App\Models\Instructor::class, 'account_id');
    }
}
