<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Rate extends Model
{
    use HasFactory;
    protected $table='courses_rate';
    protected $fillable=[
        'rate',
        'comment',

    ];
    public function course(){
        $this->belongsTo(Course::class, 'courseId');
    }
//    public function student(){
//        $this->belongsTo(Student::class, 'student-id');
//
//    }
}
