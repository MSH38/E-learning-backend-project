<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;
    protected $table='parents';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',

        'phone',
        'account_id'

    ];
//    public function supports(){
//        return $this->hasMany('instructors_support','instructor_id');
//    }
    public function my_account(){
        return $this->belongsTo('accounts','account_id');
    }
    public function students(){
        return $this->hasMany('students','parent_id');
    }

}
