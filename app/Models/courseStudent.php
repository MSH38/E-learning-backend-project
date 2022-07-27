<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseStudent extends Model
{
    use HasFactory;
    protected $table ="courses_students";
    protected $fillable=[
        'mark',
        'status',
        'studentId',
        'courseId'
    ];

}
