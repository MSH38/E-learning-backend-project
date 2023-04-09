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

    protected $guarded=['id'];
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
    
    
}
