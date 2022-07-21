<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [

        'password',
        'username',
'role',

    ];
    public function students(){
        return $this->hasOne('students','account_id');
    }
    public function parent(){
        return $this->hasMany('parents','account_id');
    }
    public function instructor(){
        return $this->hasMany('instructors','instructor_id');
    }
    public function admin(){
        return $this->hasMany('admin','admin_id');
    }
}
