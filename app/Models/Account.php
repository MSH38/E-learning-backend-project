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
//    public function students(){
//        return $this->hasOne(Student::class,'account_id');
//    }
    public function parent(){
        return $this->hasOne(ParentModel::class,'account_id');
    }
    public function instructor(){
        return $this->hasOne(Instructor::class,'account_id');
    }
//    public function admin(){
//        return $this->hasMany('admin','admin_id');
//    }
}
