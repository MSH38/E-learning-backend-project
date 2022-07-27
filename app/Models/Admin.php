<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Model
{
    use LaratrustUserTrait;
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone'

    ];
public function instructors_supported(){
    return $this->hasMany(Instructor_support::class);
}
//public function students_supported(){
//    return $this->hasMany(Student_support::class);
//}
public function accepted_courses(){
    return $this->hasMany(Course::class,'accepted_by');
}
//public function offers(){
//    return $this->hasMany(Offer::class, 'offer_id');
//}

}
