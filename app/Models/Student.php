<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="students";
    protected $fillable=[

        'first_name',
        'last_name',

        'phone',
        'address',
        'scientific_degree',
        'birth_date',
        'account_id',
        'parent_id'
    ];
    public function account(){
        return $this->belongsTo(User::class,'account_id');
    }

}
