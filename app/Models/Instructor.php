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
        'email',
        'address',
        'phone'

    ];
    public function instructors_supported(){
        return $this->hasMany('instructors_support');
    }
    public function students_supported(){
        return $this->hasMany('students_support');
    }
    public function accepted_courses(){
        return $this->hasMany('courses','accepted_by');
    }
    public function offers(){
        return $this->hasMany('offers');
    }
}
