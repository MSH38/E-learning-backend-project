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
        'phone',
        'account_id'

    ];
    public function supports(){
        return $this->hasMany('instructors_support','instructor_id');
    }
    public function my_account(){
        return $this->belongsTo('accounts','account_id');
    }
    public function courses(){
        return $this->hasMany('courses','instructor_id');
    }

}
