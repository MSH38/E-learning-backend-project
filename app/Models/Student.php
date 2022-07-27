<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="students";
    protected $fillable=[
        'student_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'scientific_degree',
        'birth_date',
        'account_id',
        'parent_id'
    ];

}
