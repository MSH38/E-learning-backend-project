<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'fess',
        'description',
        'category_id',
        'instructor_id',
        'accepted_by'
    ];
    public function sub_category()
    {
        return $this->belongsTo('App\Models\Sub_Category','sub_category_id');
    }
    public function instructor()
    {
        return $this->belongsTo('App\Models\Instructor','instructor_id');
    }
    public function accepted_by()
    {
        return $this->belongsTo('App\Models\Admin','accepted_by');
    }
}
