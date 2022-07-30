<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    protected $table='categories';
    protected $fillable=[
        'name',
'image',
        'status',
        'slug',



    ];
    public function subcategory()
    {
        return $this->hasMany(\App\Models\Sub_Category::class, 'category_id');
    }

//    public function parent()
//    {
//        return $this->belongsTo(\App\Models\Category::class, 'parent_id');
//    }
}
