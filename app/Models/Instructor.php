<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',

        'phone',
        'account_id'

    ];
    public function supports(){
        return $this->hasMany(Instructor_support::class,'instructor_id');
    }
    public function account(){
        return $this->belongsTo(User::class,'account_id');
    }
    public function courses(){
        return $this->hasMany(Course::class,'instructor_id');
    }

}
